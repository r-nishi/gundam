<?php
/**
 * @author   r-nishi
 * @extends  Controller_Exvsfb
 */
class Controller_Exvsfb_Bansheenorn extends Controller_Exvsfb
{
    public $damage_db;

    public function before(){
        parent::before();
        // ダメージ表読込
        $this->damage_db = Config::load('ms/exvsfb/bansheenorn/damage_db');
    }

    /**
     * @access public
     * @param int $sum_damage 累計ダメージ
     * @param array $sum_name セレクトボックスから選んだ名前
     * @param int $atk_cnt セレクトボックスを何個表示させるか
     * @param string $awakening 覚醒の種類(assault/blast)
     * @return Response
     */
    public function action_index($sum_damage = null,$sum_name = array(),$atk_cnt = 1,$awakening = "")
    {
        // セレクトボックス作成
        $select_list = $this->make_select($this->damage_db);

        $path = "exvsfb/bansheenorn/index"; // 機体追加の際,ここだけパスを入れればOKなはず

        // viewを作成
        $view = $this->make_view($path,$select_list,$atk_cnt,$sum_name,$sum_damage,$awakening);

        $this->template->content = $view;
    }

    /**
     * POSTを受け取る
     * @access public
     * @return リダイレクト
     */
    public function action_calculation()
    {
        // POSTで受け取る
        $data = Input::post();

        $ms_name = BANSHEE_NORN; // 機体追加の際、ここに機体名の定数を入れてあげる
        $rtn_data = $this->post_process($data,$ms_name);

        return $this->action_index($rtn_data['sum_damage'],$rtn_data['sum_name'],$rtn_data['atk_cnt'],$data['awakening']);
    }
}
