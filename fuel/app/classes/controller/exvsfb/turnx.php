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

        // 受け取ったPOSTを空になるまで回す
        foreach ($data as $value) {

            $atk_cnt++; // 攻撃回数

            // 無効な値が入ってきたらループを止める
            if(empty($value)){
                break;
            }

            // ダメージデータ表を回す
            foreach ($this->damage_db as $key => $value2) :
                if ($value == $key) {

                    foreach ($value2 as $key2 => $value3) :

                        $decimal_fraction = 0; // 少数表記された単発補正値を入れる
                        $tmp_dame = 0; // 一時的なダメ

                        $decimal_fraction = $value3['damage_scaling'] / 100; // 少数表記に 0.3など

                        if ($sum_dame == 0) {
                            // 最初の一回目の攻撃
                            echo $sum_dame = $value3['damage'];
                            echo "<br>";

                            if (@$value3['same_flg'] == 1) {
                                // ダウン値計算
                                $sum_down += $value3['down_point'];
                                continue;
                            }

                        } elseif (@$value3['same_flg'] == 1) {
                            // 同時ヒット時の攻撃

                            // 累計補正値が適用された単発ダメージを計算
                            $tmp_dame = $value3['damage'] * (1 - $sum_scal);

                            // echo "+";
                            // echo $tmp_dame;

                            // 小数点切り上げ
                            $tmp_dame = ceil($tmp_dame);

                            // echo "(".$tmp_dame.")";

                            // ダメージを合算する
                            $sum_dame += $tmp_dame;

                            // ダウン値計算
                            $sum_down += $value3['down_point'];

                            continue;

                        } elseif (@$value3['same_flg'] == 2) {
                            // 同時ヒット時の攻撃(2本目)

                            // 累計補正値が適用された単発ダメージを計算
                            $tmp_dame = $value3['damage'] * (1 - $sum_scal);

                            // 小数点切り上げ
                            $tmp_dame = ceil($tmp_dame);

                            // ダメージを合算する
                            $sum_dame += $tmp_dame;

                            // 単発補正値を2倍する
                            $decimal_fraction = $decimal_fraction * 2;

                        } else {
                            /*
                            // 累計補正値が適用された単発ダメージを計算
                            $tmp_dame = $value3['damage'] * (1 - $sum_scal);

                            echo "単発ダメ";
                            echo $tmp_dame;
                            echo "<br>";

                            // 小数点切り上げ
                            $tmp_dame = ceil($tmp_dame);

                            // 計算前合計ダメ
                            echo "合計".$sum_dame."->";

                            // 合算する
                            echo $sum_dame = $sum_dame + $tmp_dame;
                            echo "<br>";
                            */

                            echo ceil($累計威力 + $単発威力 * $累計補正率);
                        }

                        // ダウン値計算
                        $sum_down += $value3['down_point'];
                        if ($sum_down >= 5) {
                            $down_flg = 1;
                            break;
                        }
                        // 単発補正値を累計補正値に加算する
                        $sum_scal += $decimal_fraction;

                        echo "累計補正率：";
                        echo 1 - $sum_scal;
                        echo "<br>";
                    endforeach;

                }
            endforeach;

            $sum_name[] = $value;

            // ダウン値確認
            if ($down_flg > 0){
            	break;
            }

        }
        return $this->action_index($sum_dame,$sum_name,$atk_cnt);
    }

    /**
     * POSTを受け取る
     */
    public function action_calculation2()
    {
        $sum_dame = 0; // ダメージ合計値
        $atk_cnt  = 0; // 攻撃回数
        $sum_scal = 1; // 累計補正値
        $sum_down_point = 0; // 累計ダウン値

        $tmp_data = array(); // 一時的にダメージ値を保存
        $sum_name = array(); // 使用コンボ*現在めんどいのでシカト無視

        // POSTで受け取る
        $data = Input::post();

//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";

        // 受け取ったPOSTを空になるまで回す
        foreach ($data as $value) :

            $atk_cnt++; // 攻撃回数

            // 無効な値が入ってきたらループを止める
            if(empty($value)){
                break;
            }

            // ダメージデータ表を回す
            foreach ($this->damage_db as $key => $value2) :
                if ($value == $key) {
                    $tmp_data = $this->damage_calculation($value2,$sum_dame,$sum_scal,$sum_down_point);
                    $sum_dame = $tmp_data['damage'];
                    $sum_scal = $tmp_data['scaling'];
                    $sum_down_point = $tmp_data['down_point'];
                }
            endforeach;

            $sum_name[] = $value; // セレクトリスト維持の為に何を渡したか記憶

            // ダウン値確認
            if ($sum_down_point >= 5){
                break;
            }

        endforeach;
        return $this->action_index($sum_dame,$sum_name,$atk_cnt);
    }

    /**
     * ダメージ値を計算する
     *
     */
    private function damage_calculation($data,$sum_dame,$sum_scal,$sum_down_point)
    {
        $単発威力 = 0;
        $単発補正率 = 0;

        $累計威力 = $sum_dame;
        $累計補正率 = $sum_scal;
        $累計ダウン値 = $sum_down_point;

        $return_data = array();

        foreach ($data as $key => $value):
//             echo "<pre>";
//             print_r($value);
//             echo "</pre>";

            $単発補正率 = $value['damage_scaling'] / 100; // 0.05 -> -5%
            $単発威力 = $value['damage'];

            if($累計威力 == 0){
                $累計威力 += $単発威力;
            } else {
                $累計威力 = ceil($累計威力 + $単発威力 * $累計補正率);
            }
            $累計補正率 -= $単発補正率;

            // ダウン値計算
            $累計ダウン値 += $value['down_point'];
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
