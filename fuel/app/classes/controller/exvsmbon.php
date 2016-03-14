<?php
/**
 * Created by PhpStorm.
 * User: r-nishi
 * Date: 16/03/10
 * Time: 11:52
 * @extends Controller
 */
class Controller_Exvsmbon extends Controller
{
    protected $damage_db; // ダメージデータ表

    public function before(){
        // ▼定義ファイル読み込み処理▼

        // ダメージ表読み込み
        $this->damage_db = Config::load('damage_db');

        // グローバル定数設定
        Config::load('constant',true);
        // ▲定義ファイル読み込み処理▲

    }
} 