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
	public function action_index($sum_dame = null,$sum_name = array(),$atk_cnt = 1)
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

        if(!empty($sum_dame)){
            $view->set('sum_dame',$sum_dame);
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
        $awakening = 1; // 覚醒補正値

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

            // ダウン値確認
            if ($sum_down_point > 4.9){
                break;
            }

        endforeach;
        return $this->action_index($sum_dame,$sum_name,$atk_cnt);
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
        $覚醒補正率 = $awakening;

        $return_data = array();

        foreach ($data as $key => $value):
//             echo "<pre>";
//             print_r($value);
//             echo "</pre>";

            $単発補正率 = $value['damage_scaling'] / 100; // 0.05 -> -5%
            $単発威力 = $value['damage'];

            // 覚醒補正率計算
            if ($覚醒補正率 > 1) {
                $単発威力 = $単発威力 * $覚醒補正率;
            }

            if($累計威力 == 0){
                $累計威力 = $単発威力;
                if (!empty($value['same_hit'])) {
                    continue;
                }
            } else {

                // 最低補正率は−10%
                if($累計補正率 < 0.1){
                    $累計補正率 = 0.1;
                }

                $累計威力 = ceil($累計威力 + $単発威力 * $累計補正率);

                if (!empty($value['same_hit']) && $value['same_hit'] == 1) {
                    continue;
                }
                if (!empty($value['same_hit']) && $value['same_hit'] == 2) {
                    // 1回分多い
                    $累計補正率 -= $単発補正率;
                    $累計ダウン値 += $value['down_point'];
                }
            }
            $累計補正率 -= $単発補正率;

            // ダウン値計算
            $累計ダウン値 += $value['down_point'];
            if ($累計ダウン値 > 4.9) {
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
        // ダメージ表読み込み
        foreach($this->awakening_db as $key => $value){
            if("ターンX" == $key){
                foreach($value as $key2 => $value3){
                    if($para == $key2){
                        $return = $value3;
                    }
                }
            }
        }

        return $return;
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
