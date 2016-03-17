<?php
use Fuel\Core\Controller_Template;

/**
 * @access public
 * @author r-nishi
 * @copyright r-nishi
 * @package Controller
 * @extends Controller_Template
 */
class Controller_Exvsfb extends Controller_Template
{
    protected $awakening_db; // 覚醒補正率表

    public function before()
    {
        parent::before();

        // ▼定義ファイル読み込み処理▼

        // 覚醒補正率表読込
        $this->awakening_db = Config::load('awakening_db');

        // グローバル定数設定
        Config::load('constant',true);
        // ▲定義ファイル読み込み処理▲

        $this->template->head = View::forge('head');
        $this->template->header = View::forge('header');
        $this->template->footer = View::forge('footer');
    }
} 