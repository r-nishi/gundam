<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     r-nishi
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Turnx extends Controller
{
    private $main_shooting_array;    // メイン、CS
    private $melee_array;            // 格闘
    private $sub_shooting_array;     // サブ
    private $special_shooting_array; // 特殊射撃
    private $special_melee_array;    // 特殊格闘

    /**
     * コンストラクタ代わり
     */
    public function action_turnx()
    {
        $this->main_shooting_array = array(
            "main" => array(
                "damage"         => 75,  // ダメージ
                "down_point"     => 2.0, // ダウン値
                "damage_scaling" => 30,  // 補正値
            ),
            "CS" => array(
                "damage"         => 130,
                "down_point"     => 6.0,
                "damage_scaling" => 40
            ),
            "sub" => array(
                "damage"         => 111,
                "down_point"     => 2.7,
                "damage_scaling" => 40
            )
        );
    }

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index($sum_dame = null)
	{
        $this->action_turnx();

        $main_shooting_array = array(
            "main" => "メイン",
            "sub"  => "サブ",
            "CS"   => "CS"
        );
        $view = View::forge('turnx/index');
        $view->set('select_list',$main_shooting_array);
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
        $this->action_turnx();

        $sum_dam = 0; // ダメージ合計値
        $sum_sca = 0; // 累計補正値

        // POSTで受け取る
        $data = Input::post();

        // 受け取ったPOSTを空になるまで回す
        foreach($data as $value){

            // ダメージデータ表を回す
            foreach ($this->main_shooting_array as $key => $value2) {
                if ($value == $key) {

                    $decimal_fraction = 0; // 少数表記された単発補正値を入れる
                    // $damage = 0;           // 累計補正された単発ダメージを入れる

                    $decimal_fraction = $value2['damage_scaling'] / 100; // 少数表記に 0.3など

                    if ($sum_dam == 0) {
                        $sum_dam = $value2['damage'];
                    } else {
                        // 累計補正値が適用された単発ダメージを計算し合計ダメージに加算する
                        $sum_dam += $value2['damage'] * (1 - $sum_sca);
                        $sum_dam = ceil($sum_dam); //小数点以下を切り上げる
                    }
                    $sum_sca += $decimal_fraction; // 単発補正値を累計補正値に加算する
                }
            }
        }
        return $this->action_index($sum_dam);
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
