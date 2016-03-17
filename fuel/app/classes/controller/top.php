<?php
/**
 * @package  app
 * @extends  Controller
 */
class Controller_Top extends Controller_Template
{
    public $template = "template";

    /**
     * @access  public
     */
    public function action_index()
    {
        // グローバル定数設定
        Config::load('constant',true);

        $this->template->head = View::forge('head');
        $this->template->header = View::forge('header');
        $this->template->content = View::forge('top/index');
        $this->template->footer = View::forge('footer');
    }
}
