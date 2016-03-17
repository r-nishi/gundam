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
        $this->template->content = View::forge('exvsmbon/index');
	}
}
