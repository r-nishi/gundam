<?php
/**
 * @author   r-nishi
 * @extends  Controller_Exvsfb
 */
class Controller_Exvsfb_Turnx extends Controller_Exvsfb
{
    public $damage_db;
    public $template = "exvsfb/ms_template";
    private $ms_name;
    private $ms_path;

    public function before()
    {
        parent::before();

        $this->ms_name = TURN_X;
        $this->ms_path = PATH_TURN_X;

        // ダメージ表読込
        $this->damage_db = Config::load('ms/exvsfb/turnx/damage_db');

        // テンプレートを変えた為、再定義
        $this->template->meta = View::forge('exvsfb/meta');
        $this->template->css = View::forge('exvsfb/css');
        $this->template->header = View::forge('exvsfb/header');
        $this->template->script = View::forge('exvsfb/script');
        //$this->template->footer = View::forge('exvs/footer');
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
        $this->template->ms_name = $this->ms_name;
        $this->template->path_name = $this->ms_path;
        $content_view = "exvsfb/ms/".$this->ms_path."/index";

        /* SEO対策 */
        $keyword = "ガンダム,フルブ,コンボ,exvsfb,ダメージ計算,ダメージ,".$this->ms_name;
        $description = $this->ms_name."のコンボダメージを計算";
        $title = $this->ms_name." | ".HP_NAME;

        $this->template->meta_keyword = $keyword;
        $this->template->meta_description = $description;
        $this->template->title = $title;

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

        $rtn_data = $this->post_process($data,$this->ms_name);

        return $this->action_index(
            $rtn_data['sum_damage'],
            $rtn_data['sum_name'],
            $rtn_data['atk_cnt'],
            $data['awakening'],
            $rtn_data['sum_down']
        );
    }
}
