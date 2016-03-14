<?php
/**
 * @author   r-nishi
 * @extends  Controller_Exvsfb
 */
class Controller_Exvsmbon_Top extends Controller_Exvsmbon
{
	/**
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
        $view = View::forge('exvsmbon/index');
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
