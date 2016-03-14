<?php
/**
 * @author   r-nishi
 * @extends  Controller_Exvsfb
 */
class Controller_Exvsfb_Top extends Controller_Exvsfb
{
	/**
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
        $view = View::forge('exvsfb/index');
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
