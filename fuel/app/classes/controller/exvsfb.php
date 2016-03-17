<?php
/**
 * Created by PhpStorm.
 * User: r-nishi
 * Date: 16/03/10
 * Time: 11:52
 * @extends Controller
 */
class Controller_Exvsfb extends Controller_Template
{
    public $template = "template";

    protected $damage_db;
    protected $awakening_db; // 覚醒補正率表

    public function before()
    {
        parent::before();

        // ▼定義ファイル読み込み処理▼

        // ダメージ表読込
        $this->damage_db = Config::load('ms/exvsfb/turnx/damage_db');

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