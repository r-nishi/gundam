<?php
/**
 * @package  app
 * @extends  Controller
 */
class Controller_Exvsmbon_About extends Controller_Exvsmbon
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
        $this->template->content = View::forge('exvsmbon/about/index');
    }
}
