<?php
/**
 * @author   r-nishi
 * @extends  Controller_Exvsfb
 */
class Controller_Exvsfb_Turnx extends Controller_Exvsfb
{
    /**
     * @access  public
     * @return  Response
     */
    public function action_index($sum_dame = null,$sum_name = array(),$atk_cnt = 1,$awakening = null)
    {
        // セレクトボックス作成
        $select_list = array();
        foreach($this->damage_db as $key => $value){
            $select_list[$key] = $key;
        }

        $view = View::forge('exvsfb/turnx/index');
        $view->set('select_list',$select_list);
        $view->set('atk_cnt',$atk_cnt);
        $view->set('sum_name',$sum_name);

        if (!empty($sum_dame)) {
            $view->set('sum_dame',$sum_dame);
        }
        if (!empty($awakening)) {
            $view->set('awakening',$awakening);
        }

        return Response::forge($view);
    }

    /**
     * POSTを受け取る
     */
    public function action_calculation()
    {
        $sum_dame = 0; // ダメージ合計値
        $atk_cnt  = 0; // 攻撃回数
        $sum_scal = 1; // 累計補正値
        $sum_down_point = 0; // 累計ダウン値

        $awakening = array(); // 覚醒種類と覚醒補正値
        $tmp_data = array(); // 一時的にダメージ値を保存
        $sum_name = array(); // 使用コンボ*現在めんどいのでシカト無視

        // POSTで受け取る
        $data = Input::post();

//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";

        // 覚醒取得
        if(!empty($data['awakening'])){
            $awakening = $this->get_awakening_db($data['awakening']);
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
                    $tmp_data = $this->damage_calculation($value2,$sum_dame,$sum_scal,$sum_down_point,$awakening);
                    $sum_dame = $tmp_data['damage'];
                    $sum_scal = $tmp_data['scaling'];
                    $sum_down_point = $tmp_data['down_point'];
                }
            endforeach;

            $sum_name[] = $value; // セレクトリスト維持の為に何を渡したか記憶

            if ($sum_down_point >= 5) {
                break;
            }

        endforeach;
        return $this->action_index($sum_dame,$sum_name,$atk_cnt,$data['awakening']);
    }

    /**
     * ダメージ値を計算する
     *
     */
    private function damage_calculation($data,$sum_dame,$sum_scal,$sum_down_point,$awakening)
    {
        $単発威力 = 0;
        $単発補正率 = 0;

        $累計威力 = $sum_dame;
        $累計補正率 = $sum_scal;
        $累計ダウン値 = $sum_down_point;
        $覚醒種類 = ""; // もし覚醒していたら値が入る
        $覚醒補正率 = 1;

        if (!empty($awakening)) {
            foreach ($awakening as $key => $value) {
                $覚醒種類 = $key;
                $覚醒補正率 = $value;
            }
        }

        $return_data = array();

        foreach ($data as $key => $value):
//             echo "<pre>";
//             print_r($value);
//             echo "</pre>";

            $単発補正率 = $value['damage_scaling'] / 100; // 0.05 -> -5%
            $単発威力 = $value['damage'];

            if($累計威力 == 0){
                // 覚醒補正率計算
                if (!empty($覚醒種類)) {
                    $累計威力 = ceil($単発威力 * $覚醒補正率);
                } else {
                    $累計威力 = $単発威力;
                }

                if (!empty($value['same_hit'])) {
                    continue;
                }
            } else {

                // 最低補正率は−10%
                if ($累計補正率 < 0.1) {
                    $累計補正率 = 0.1;
                }

                $補正適応後単発威力 = ceil($単発威力 * $累計補正率 * $覚醒補正率);
                $累計威力 += $補正適応後単発威力;

                // 同時ヒット時計算
                if (!empty($value['same_hit']) && $value['same_hit'] == 1) {
                    continue;
                }
                if (!empty($value['same_hit']) && $value['same_hit'] == 2) {
                    // 1回分多い
                    $累計補正率 -= $単発補正率;

                    // ダウン値計算
                    $累計ダウン値 = $this->get_down_point($覚醒種類,$累計ダウン値,$value['down_point']);

                }
            }
            $累計補正率 -= $単発補正率;

            // ダウン値計算
            $累計ダウン値 = $this->get_down_point($覚醒種類,$累計ダウン値,$value['down_point']);

            // echo $累計ダウン値."<br>"; // debug用コード
            $累計ダウン値 = (string)$累計ダウン値; // string型にキャストする(PHPは浮動小数点数の計算が苦手)

            if ($累計ダウン値 >= 5) {
                break;
            }
        endforeach;

        $return_data['damage'] = $累計威力;
        $return_data['scaling'] = $累計補正率;
        $return_data['down_point'] = $累計ダウン値;

        return $return_data;
    }

    /**
     * 覚醒補正率を取得
     */
    private function get_awakening_db($para)
    {
        $return_data = array();

        // ダメージ表読み込み
        foreach($this->awakening_db as $key => $value){
            if("ターンX" == $key){
                foreach($value as $key2 => $value3){
                    if($para == $key2){
                        $return_data[$key2] = $value3;
                    }
                }
            }
        }

        return $return_data;
    }

    /**
     * ダウン値計算
     */
    private function get_down_point($awakening,$sum_down,$down_point)
    {
        /* TXでの計算結果だけだが、おそらく覚醒中のダウン値は切り上げではなく丸めると考えられる */

        if ((!empty($awakening))) {
            // 小数点第３位を丸める
            $sum_down += round($down_point * 0.9,2);

            // 小数点第３位を切り上げ(一応処理を残しておく)
            // $tmp_down_point = $value['down_point'] * 0.9;
            // $累計ダウン値 += ceil($tmp_down_point * 100) / 100;
        } else {
            $sum_down += $down_point;
        }
        return $sum_down;
    }

    /**
     * The 404 action for the application.
     *
     * @access  public
     * @return  Response
     */
    public function action_404()
    {
        return Response::forge(Presenter::forge('welcome/404'), 404);
    }
}
