<?php
/**
 * @author r-nishi
 * @day 16/03/10
 */
return array(
    "メイン" => array(
        "damage"         => 75,  // ダメージ
        "down_point"     => 2.0, // ダウン値
        "damage_scaling" => 30,  // 補正値
    ),
    "CS" => array(
        "damage"         => 130,
        "down_point"     => 6.0,
        "damage_scaling" => 40
    ),
    "サブ" => array(
        "damage"         => 111,
        "down_point"     => 2.7,
        "damage_scaling" => 40
    ),
    "横" => array(
        "damage"         => 65,
        "down_point"     => 1.8,
        "damage_scaling" => 21
    ),
    "BD格" => array(
        "damage"         => 70,
        "down_point"     => 1.7,
        "damage_scaling" => 20
    ),
    "特格掴み" => array(
        "damage"         => 30,
        "down_point"     => 0.3,
        "damage_scaling" => 10
    ),
    "特格掴み爆発" => array(
        "掴み" => array(
            "damage"         => 30,
            "down_point"     => 0.3,
            "damage_scaling" => 10
        ),
        "爆発" => array(
            "damage"         => 160,
            "down_point"     => 5.0,
            "damage_scaling" => 40
        ),
    ),
);