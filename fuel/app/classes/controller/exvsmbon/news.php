<?php
/**
 * @package  app
 * @extends  Controller
 */
class Controller_Exvsmbon_News extends Controller_Exvsmbon
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
        $this->template->content = View::forge('exvsmbon/news/index');
    }
}
