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
        $this->template->content = View::forge('exvsfb/news/index');
    }
}
