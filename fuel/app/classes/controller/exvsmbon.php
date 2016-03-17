<?php
use Fuel\Core\Controller_Template;

/**
 * Created by PhpStorm.
 * User: r-nishi
 * Date: 16/03/10
 * Time: 11:52
 * @extends Controller
 */
class Controller_Exvsmbon extends Controller_Template
{
    public function before()
    {
        parent::before();

        // ▼定義ファイル読み込み処理▼

        // グローバル定数設定
        Config::load('constant',true);
        // ▲定義ファイル読み込み処理▲

        $this->template->head = View::forge('head');
        $this->template->header = View::forge('header');
        $this->template->footer = View::forge('footer');
    }
} 