<?php
/**
 * @package  app
 * @extends  Controller
 */
class Controller_Top extends Controller
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

        $view = View::forge('top/index');
        return Response::forge($view);
    }

    /**
     * The 404 action for the application.
     *
     * @access  public
     * @return  Response
     */
    public function action_404()
    {
        return Response::forge(Presenter::forge('welcome/404'), 404);
    }
}
