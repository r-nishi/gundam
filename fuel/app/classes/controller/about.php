<?php
/**
 * @package  app
 * @extends  Controller
 */
class Controller_About extends Controller_Template
{
    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        // グローバル定数設定
        Config::load('constant',true);

        $this->template->head = View::forge('head');
        $this->template->drawer = View::forge('drawer');
        $this->template->content = View::forge('about/index');
        $this->template->footer = View::forge('footer');
    }
}
