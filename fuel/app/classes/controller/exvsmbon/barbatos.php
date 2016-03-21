<?php
/**
 * @author   r-nishi
 * @extends  Controller_Exvsfb
 */
class Controller_Exvsmbon_Barbatos extends Controller_Exvsmbon
{
    public $damage_db;
    public $template = "exvsmbon/ms_template";

    public function before()
    {
        parent::before();

        // ダメージ表読込
        $this->damage_db = Config::load('ms/exvsmbon/barbatos/damage_db');

        $this->template->head = View::forge('exvsmbon/head');
        $this->template->header = View::forge('exvsmbon/header');
        $this->template->script = View::forge('exvsmbon/script');
        //$this->template->footer = View::forge('exvsmbon/footer');
    }

    /**
     * @access public
     * @param int $sum_damage 累計ダメージ
     * @param array $sum_name セレクトボックスから選んだ名前
     * @param int $atk_cnt セレクトボックスを何個表示させるか
     * @param string $awakening 覚醒の種類(assault/blast)
     * @param float $sum_down 累計ダウン値
     * @return Response
     */
    public function action_index($sum_damage = null,$sum_name = array(),$atk_cnt = 1,$awakening = "",$sum_down = 0.0)
    {
        // セレクトボックス作成
        $select_list = $this->make_select($this->damage_db);

        /* 機体追加時 */
        $this->template->ms_name = BARBATOS;
        $this->template->path_name = "barbatos";
        $content_view = "exvsmbon/ms/barbatos/index";

        /* 共通処理 */
        $this->template->atk_cnt = $atk_cnt;
        $this->template->select_list = $select_list;
        $this->template->sum_name = $sum_name;
        if (!empty($sum_damage)) {
            $this->template->sum_dame = $sum_damage;
        }
        if (!empty($awakening)) {
            $this->template->awakening = $awakening;
        }
        if (!empty($sum_down)) {
            $this->template->sum_down = $sum_down;
        }

        $this->template->content = View::forge($content_view);
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

        $ms_name = BARBATOS; // 機体追加の際、ここに機体名の定数を入れてあげる
        $rtn_data = $this->post_process($data,$ms_name);

        return $this->action_index(
            $rtn_data['sum_damage'],
            $rtn_data['sum_name'],
            $rtn_data['atk_cnt'],
            $rtn_data['awakening'],
            $rtn_data['sum_down']
        );
    }
}
