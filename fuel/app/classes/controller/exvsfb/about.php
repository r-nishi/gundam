<?php
/**
 * @package  app
 * @extends  Controller
 */
class Controller_Exvsfb_About extends Controller_Exvsfb
{
    public function before(){
        parent::before();
    }

    /**
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        $this->template->content = View::forge('exvsfb/about/index');
    }
}
