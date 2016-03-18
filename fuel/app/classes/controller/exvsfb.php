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

    public function before()
    {
        parent::before();

        // ▼定義ファイル読み込み処理▼

        // 覚醒補正率表読込
        $this->awakening_db = Config::load('awakening_db');

        // グローバル定数設定
        Config::load('constant',true);
        // ▲定義ファイル読み込み処理▲

        $this->template->head = View::forge('head');
        $this->template->header = View::forge('header');
        $this->template->footer = View::forge('footer');
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
} 