<?php
/**
 * @package  app
 * @extends  Controller
 */
class Controller_About extends Controller
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

		$view = View::forge('about/index');
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
		return Response::forge(Presenter::forge('top/404'), 404);
	}
}
