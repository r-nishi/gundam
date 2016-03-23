<?php
/**
 * @package  app
 * @extends  Controller
 */
class Controller_Exvsfb_News extends Controller_Exvsfb
{
    public function before(){
        parent::before();
    }

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        /* SEO対策 */
        $keyword = "ガンダム,フルブ,コンボ,exvsfb,ダメージ計算,ダメージ";
        $description = "最近の更新履歴";
        $title = "NEWS | ".HP_NAME;

        $this->template->meta_keyword = $keyword;
        $this->template->meta_description = $description;
        $this->template->title = $title;

        $this->template->content = View::forge('exvsfb/news/index');
    }
}
