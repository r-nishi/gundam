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

        $view = View::forge('turnx/index');
        $view->set('select_list',$select_list);
        $view->set('atk_cnt',$atk_cnt);
        $view->set('sum_name',$sum_name);

        if(!empty($sum_dame)){
            $view->set('sum_dame',$sum_dame);
        }

        return Response::forge($view);
	}

    /**
     * ダメージ値を計算する
     */
    public function action_calculation()
    {
        $sum_dame = 0; // ダメージ合計値
        $sum_scal = 0; // 累計補正値
        $sum_down = 0; // 累計ダウン値
        $down_flg = 0; // ダウン値用フラグ
        $atk_cnt  = 0; // 攻撃回数

        $sum_name = array(); // 使用コンボ

        // POSTで受け取る
        $data = Input::post();

        // debug用コード
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";

        // 受け取ったPOSTを空になるまで回す
        foreach($data as $value){

            $atk_cnt++; // 攻撃回数

            // 無効な値が入ってきたらループを止める
            if(empty($value)){
                break;
            }

            // ダメージデータ表を回す
            foreach ($this->damage_db as $key => $value2) :
                if ($value == $key) {

                    $array_count = count($value2,COUNT_RECURSIVE); // 連続攻撃か判定

                    if ($array_count == 3) {
                        // 単発処理

                        $decimal_fraction = 0; // 少数表記された単発補正値を初期化
                        $tmp_dame = 0; // 一時的なダメ

                        $decimal_fraction = $value2['damage_scaling'] / 100; // 少数表記に 0.3など

                        if ($sum_dame == 0) {
                            echo $sum_dame = $value2['damage'];
                        } else {
                            // 累計補正値が適用された単発ダメージを計算
                            $tmp_dame = $value2['damage'] * (1 - $sum_scal);

                            // 小数点切り上げ
                            echo "+";
                            echo $tmp_dame = ceil($tmp_dame);

                            // 合算する
                            $sum_dame += $tmp_dame;
                        }

                        // ダウン値計算
                        $sum_down += $value2['down_point'];
                        if ($sum_down >= 5) {
                            $down_flg = 1;
                        } else {
                            // 単発補正値を累計補正値に加算する
                            $sum_scal += $decimal_fraction;
                        }
                    } else {
                        // 連続処理

                        foreach($value2 as $key => $value3) :

                            $decimal_fraction = 0; // 少数表記された単発補正値を入れる
                            $tmp_dame = 0; // 一時的なダメ

                            $decimal_fraction = $value3['damage_scaling'] / 100; // 少数表記に 0.3など

                            if ($sum_dame == 0) {
                                echo $sum_dame = $value3['damage'];
                            } else {
                                // 累計補正値が適用された単発ダメージを計算
                                $tmp_dame = $value3['damage'] * (1 - $sum_scal);

                                // 小数点切り上げ
                                echo "+";
                                echo $tmp_dame = ceil($tmp_dame);

                                // 合算する
                                $sum_dame += $tmp_dame;
                            }

                            // ダウン値計算
                            $sum_down += $value3['down_point'];
                            if ($sum_down >= 5) {
                                $down_flg = 1;
                                break;
                            } else {
                                // 単発補正値を累計補正値に加算する
                                $sum_scal += $decimal_fraction;
                            }
                        endforeach;
                    }
                }
            endforeach;

            $sum_name[] = $value;

            // ダウン値確認
            if ($down_flg > 0){
            	break;
            }

        }
        // 小数点以下を切り上げる
        // $sum_dame = ceil($sum_dame);

        echo "<br>補正率-";
        echo $sum_scal * 100;
        echo "%";

        return $this->action_index($sum_dame,$sum_name,$atk_cnt);
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
