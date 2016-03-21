<?php
use Fuel\Core\Controller_Template;

/**
 * @access public
 * @author r-nishi
 * @copyright r-nishi
 * @package Controller
 * @extends Controller_Template
 */
class Controller_Exvsfb extends Controller_Template
{
    protected $awakening_db; // 覚醒補正率表
    public $template = 'exvsfb/template';

    public function before()
    {
        parent::before();

        // ▼定義ファイル読み込み処理▼
        // グローバル定数設定
        Config::load('constant',true);

        // 覚醒補正率表読込
        $this->awakening_db = Config::load('awakening_db');
        // ▲定義ファイル読み込み処理▲

        $this->template->head = View::forge('exvsfb/head');
        $this->template->header = View::forge('exvsfb/header');
        $this->template->script = View::forge('exvsfb/script');
        //$this->template->footer = View::forge('exvs/footer');
    }

    public function action_index(){
        $this->template->content = View::forge('exvsfb/index');
    }

    /**
     * セレクトボックス生成
     * @param array $damage_db ダメージデータ表
     * @return array $select_list
     */
    final protected function make_select($damage_db)
    {
        $select_list = array();
        foreach($damage_db as $key => $value){
            $select_list[$key] = $key;
        }
        return $select_list;
    }

    /**
     * 覚醒補正率を取得
     * @access final protected
     * @param varchar $awakening 覚醒種類(assault/blast)
     * @param varchar $ms_name MS名
     * @return array $return_data (assault/blast)=>(覚醒補正率)
     */
    final protected function get_awakening_db($awakening,$ms_name)
    {
        $return_data = array();

        // ダメージ表読み込み
        foreach($this->awakening_db as $key => $value){
            if($ms_name == $key){
                foreach($value as $key2 => $value3){
                    if($awakening == $key2){
                        $return_data[$key2] = $value3;
                    }
                }
            }
        }

        return $return_data;
    }

    /**
     * ダウン値計算
     * @access final protected
     * @param varchar $awakening 覚醒種類(assault/blast)
     * @param float $sum_down 累計ダウン値
     * @param float $down_point 単発ダウン値
     * @return float $sum_down 計算後の累計ダウン値
     *
     * @memo
     * TXでの計算結果だけだが、おそらく覚醒中のダウン値は切り上げではなく丸めると考えられる
     */
    final protected function get_down_point($awakening,$sum_down,$down_point)
    {
        if ((!empty($awakening))) {
            // 小数点第３位を丸める
            $sum_down += round($down_point * 0.9,2);

            // 小数点第３位を切り上げ(一応処理を残しておく)
            // $tmp_down_point = $value['down_point'] * 0.9;
            // $sum_down += ceil($tmp_down_point * 100) / 100;
        } else {
            $sum_down += $down_point;
        }
        return $sum_down;
    }

    /**
     * ダメージ値を計算する
     * @access final protected
     * @param array $data ダメージデータ表
     * @param float $sum_damage 累計威力
     * @param float $sum_scaling 累計補正率
     * @param float $sum_down_point 累計ダウン値
     * @param array $awakening 覚醒種類(assault/blast) => 覚醒補正率(1.2とか)
     * @return array
     */
    final protected function damage_calculation($data,$sum_damage,$sum_scaling,$sum_down_point,$awakening)
    {
        $awakening_type = ""; // もし覚醒していたら値が入る
        $awakening_scaling = 1;
        $same_hit = 1; //同時ヒット回数

        if (!empty($awakening)) {
            foreach ($awakening as $key => $value) {
                $awakening_type = $key;
                $awakening_scaling = $value;
            }
        }

        $return_data = array();

        foreach ($data as $key => $value):
//             echo "<pre>";
//             print_r($value);
//             echo "</pre>";

            $single_scaling = $value['damage_scaling'] / 100; // 0.05 -> -5%
            $single_damage = $value['damage'];

            if($sum_damage == 0){
                // 覚醒補正率計算
                if (!empty($awakening_type)) {
                    $sum_damage = ceil($single_damage * $awakening_scaling);
                } else {
                    $sum_damage = $single_damage;
                }

                if (!empty($value['same_hit'])) {
                    continue;
                }
            } else {

                // 最低補正率は−10%
                if ($sum_scaling < 0.1) {
                    $sum_scaling = 0.1;
                }

                // float型の計算でバグったのでstring型にキャストして対応
                $sum_scaling = (string)$sum_scaling;

//                // debug用コード
//                echo "累計補正率:";
//                var_dump($sum_scaling);
//                echo "<br>";

                // 補正適応後単発ダメージ
                $applied_single_damage = ceil($single_damage * $sum_scaling * $awakening_scaling);

//                echo "単発威力:";
//                var_dump($applied_single_damage);
//                echo "<br>";

                $sum_damage += $applied_single_damage;
                // echo "累計威力:".$sum_damage."<br>"; // debug用コード

                // 同時ヒット時計算
                if (!empty($value['same_hit']) && $value['same_hit'] == "beginning") {
                    continue;
                }
                if (!empty($value['same_hit']) && $value['same_hit'] == "middle") {
                    $same_hit++;
                    continue;
                }
                if (!empty($value['same_hit']) && $value['same_hit'] == "end") {
                    for ($cnt = 0; $cnt <= $same_hit; $cnt++) {
                        $sum_scaling -= $single_scaling;
                        // ダウン値計算
                        $sum_down_point = $this->get_down_point($awakening_type,$sum_down_point,$value['down_point']);
                    }
                }
            }
            $sum_scaling -= $single_scaling;

            // ダウン値計算
            $sum_down_point = $this->get_down_point($awakening_type,$sum_down_point,$value['down_point']);

            // echo $sum_down_point."<br>"; // debug用コード
            $sum_down_point = (string)$sum_down_point; // string型にキャストする(PHPは浮動小数点数の計算が苦手)

            if ($sum_down_point >= 5) {
                break;
            }
        endforeach;

        $return_data['damage'] = $sum_damage;
        $return_data['scaling'] = $sum_scaling;
        $return_data['down_point'] = $sum_down_point;

        return $return_data;
    }

    /**
     * ポスト処理
     * @param $data
     * @param $ms_name
     *
     * @return array
     * @internal param $atk_cnt
     * @internal param $sum_damage
     * @internal param $sum_scaling
     * @internal param $sum_down_point
     * @internal param $awakening
     */
    final protected function post_process($data,$ms_name)
    {
        $return_data = array();

        $atk_cnt = 0; // 攻撃回数
        $sum_damage = 0; // ダメージ合計値
        $sum_scaling = 1; // 累計補正値
        $sum_down_point = 0; // 累計ダウン値

        $awakening = array(); // 覚醒種類と覚醒補正値
        $tmp_data = array(); // 一時的にダメージ値を保存
        $sum_name = array(); // 使用コンボ

        // 覚醒取得
        if(!empty($data['awakening'])){
            $awakening = $this->get_awakening_db($data['awakening'],$ms_name);
        }

        // 受け取ったPOSTを空になるまで回す
        foreach ($data as $key => $value) :

            // 覚醒データは飛ばす
            if($key == "awakening"){
                continue;
            }

            $atk_cnt++; // 攻撃回数

            // 無効な値が入ってきたらループを止める
            if(empty($value)){
                break;
            }

            // ダメージデータ表を回す
            foreach ($this->damage_db as $key2 => $value2) :
                if ($value == $key2) {
                    $tmp_data = $this->damage_calculation($value2,$sum_damage,$sum_scaling,$sum_down_point,$awakening);
                    $sum_damage = $tmp_data['damage'];
                    $sum_scaling = $tmp_data['scaling'];
                    $sum_down_point = $tmp_data['down_point'];
                }
            endforeach;

            $sum_name[] = $value; // セレクトリスト維持の為に何を渡したか記憶

            if ($sum_down_point >= 5) {
                break;
            }
        endforeach;

        $return_data['sum_damage'] = $sum_damage;
        $return_data['sum_name'] = $sum_name;
        $return_data['atk_cnt'] = $atk_cnt;
        $return_data['awakening'] = $awakening;
        $return_data['sum_down'] = $sum_down_point;

        return $return_data;
    }
}