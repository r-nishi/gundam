<?php
/**
 * @author   r-nishi
 * @extends  Controller_Exvsfb
 */
class Controller_Exvsfb_Top extends Controller_Exvsfb
{
    /**
     * @access  public
     */
    public function action_index()
    {
        $this->template->content = View::forge('exvsfb/index');
    }
}
