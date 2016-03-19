<?php
/**
 * @author r-nishi
 * @day 16/03/10
 * バンシィ・ノルンのダメージ表
 */
return array(
    "BM" => array(
        "BM" => array(
            "damage"         => 90, // ダメージ
            "down_point"     => 2.0, // ダウン値
            "damage_scaling" => 35,  // 補正値
        ),
    ),
    "Nサブ(1hit)" => array(
        "弾頭1" => array(
            "damage"         => 60,
            "down_point"     => 0.1,
            "damage_scaling" => 30,
        ),
        "爆風1" => array(
            "damage"         => 32,
            "down_point"     => 1.4,
            "damage_scaling" => 10,
        ),
    ),
    "Nサブ(2hit)" => array(
        "弾頭1" => array(
            "damage"         => 60,
            "down_point"     => 0.1,
            "damage_scaling" => 30,
        ),
        "弾頭2" => array(
            "damage"         => 60,
            "down_point"     => 0.1,
            "damage_scaling" => 30,
        ),
        "爆風1" => array(
            "damage"         => 32,
            "down_point"     => 1.4,
            "damage_scaling" => 10,
        ),
        "爆風2" => array(
            "damage"         => 32,
            "down_point"     => 1.4,
            "damage_scaling" => 10,
        ),
    ),
    "Nサブ(3hit)" => array(
        "弾頭1" => array(
            "damage"         => 60,
            "down_point"     => 0.1,
            "damage_scaling" => 30,
        ),
        "弾頭2" => array(
            "damage"         => 60,
            "down_point"     => 0.1,
            "damage_scaling" => 30,
        ),
        "弾頭3" => array(
            "damage"         => 60,
            "down_point"     => 0.1,
            "damage_scaling" => 30,
        ),
        "爆風1" => array(
            "damage"         => 32,
            "down_point"     => 1.4,
            "damage_scaling" => 10,
        ),
        "爆風2" => array(
            "damage"         => 32,
            "down_point"     => 1.4,
            "damage_scaling" => 10,
        ),
        "爆風3" => array(
            "damage"         => 32,
            "down_point"     => 1.4,
            "damage_scaling" => 10,
        ),
    ),
    "横サブ(1hit)" => array(
        "1" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
        ),
    ),
    "横サブ(2hit)" => array(
        "1" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "beginning"
        ),
        "2" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "end"
        ),
    ),
    "横サブ(3hit)" => array(
        "1" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "beginning"
        ),
        "2" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "middle"
        ),
        "3" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "end"
        ),
    ),
    "横サブ(4hit)" => array(
        "1" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "beginning"
        ),
        "2" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "middle"
        ),
        "3" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "middle"
        ),
        "4" => array(
            "damage"         => 30,
            "down_point"     => 2.4,
            "damage_scaling" => 30,
            "same_hit"       => "end"
        ),
    ),
    "格CS" => array(
        "格CS" => array(
            "damage"         => 95, // ダメージ
            "down_point"     => 2.0, // ダウン値
            "damage_scaling" => 30,  // 補正値
        ),
    ),
    "N" => array(
        "N" => array(
            "damage"         => 75, // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
    ),
    "NN" => array(
        "N" => array(
            "damage"         => 75, // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
        "NN" => array(
            "damage"         => 60, // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
    ),
    "NNN" => array(
        "N" => array(
            "damage"         => 75,  // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
        "NN" => array(
            "damage"         => 60,  // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
        "NNN1" => array(
            "damage"         => 20,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 3,   // 補正値
        ),
        "NNN2" => array(
            "damage"         => 20,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 3,   // 補正値
        ),
        "NNN3" => array(
            "damage"         => 20,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 3,   // 補正値
        ),
        "NNN4" => array(
            "damage"         => 20,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 3,   // 補正値
        ),
    ),
    "NNNN" => array(
        "N" => array(
            "damage"         => 75,  // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
        "NN" => array(
            "damage"         => 60,  // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
        "NNN1" => array(
            "damage"         => 20,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 3,   // 補正値
        ),
        "NNN2" => array(
            "damage"         => 20,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 3,   // 補正値
        ),
        "NNN3" => array(
            "damage"         => 20,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 3,   // 補正値
        ),
        "NNN4" => array(
            "damage"         => 20,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 3,   // 補正値
        ),
        "NNNN" => array(
            "damage"         => 85,  // ダメージ
            "down_point"     => 0.8, // ダウン値
            "damage_scaling" => 10,  // 補正値
        ),
    ),
    "前" => array(
        "盾殴り" => array(
            "damage"         => 70, // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
    ),
    "前N" => array(
        "盾殴り" => array(
            "damage"         => 70, // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
        "上段蹴り" => array(
            "damage"         => 65, // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
    ),
    "前NN" => array(
        "盾殴り" => array(
            "damage"         => 70, // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
        "上段蹴り" => array(
            "damage"         => 65, // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
        "切り抜け" => array(
            "damage"         => 90, // ダメージ
            "down_point"     => 1.0, // ダウン値
            "damage_scaling" => 12,  // 補正値
        ),
    ),
    "BD格" => array(
        "斬り抜け" => array(
            "damage"         => 65,  // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
    ),
    "BD格N" => array(
        "斬り抜け" => array(
            "damage"         => 65,  // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
        "突き" => array(
            "damage"         => 55,  // ダメージ
            "down_point"     => 0.1, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
        "輸送1" => array(
            "damage"         => 8, // ダメージ
            "down_point"     => 0, // ダウン値
            "damage_scaling" => 2, // 補正値
        ),
        "輸送2" => array(
            "damage"         => 8, // ダメージ
            "down_point"     => 0, // ダウン値
            "damage_scaling" => 2, // 補正値
        ),
        "輸送3" => array(
            "damage"         => 8, // ダメージ
            "down_point"     => 0, // ダウン値
            "damage_scaling" => 2, // 補正値
        ),
        "輸送4" => array(
            "damage"         => 8, // ダメージ
            "down_point"     => 0, // ダウン値
            "damage_scaling" => 2, // 補正値
        ),
        "輸送5" => array(
            "damage"         => 8, // ダメージ
            "down_point"     => 0, // ダウン値
            "damage_scaling" => 2, // 補正値
        ),
        "輸送6" => array(
            "damage"         => 8, // ダメージ
            "down_point"     => 0, // ダウン値
            "damage_scaling" => 2, // 補正値
        ),
        "蹴り飛ばし" => array(
            "damage"         => 80,  // ダメージ
            "down_point"     => 1.0, // ダウン値
            "damage_scaling" => 10,  // 補正値
        ),
    ),
    "横" => array(
        "横" => array(
            "damage"         => 70, // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
    ),
    "横N" => array(
        "横" => array(
            "damage"         => 70, // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
        "横N" => array(
            "damage"         => 60, // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
    ),
    "横NN" => array(
        "横" => array(
            "damage"         => 70,  // ダメージ
            "down_point"     => 1.7, // ダウン値
            "damage_scaling" => 20,  // 補正値
        ),
        "横N" => array(
            "damage"         => 60,  // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
        "横NN1" => array(
            "damage"         => 32,  // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 4,   // 補正値
        ),
        "横NN2" => array(
            "damage"         => 32,  // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 4,   // 補正値
        ),
        "横NN3" => array(
            "damage"         => 32,  // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 4,   // 補正値
        ),
    ),
    "後(スタン)" => array(
        "ジュッテ" => array(
            "damage"         => 0, // ダメージ
            "down_point"     => 0, // ダウン値
            "damage_scaling" => 0,  // 補正値
        ),
    ),
    "後N" => array(
        "ジュッテ" => array(
            "damage"         => 0, // ダメージ
            "down_point"     => 0, // ダウン値
            "damage_scaling" => 0,  // 補正値
        ),
        "袈裟斬り" => array(
            "damage"         => 60,  // ダメージ
            "down_point"     => 1.0, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
        "斬り上げ" => array(
            "damage"         => 70,  // ダメージ
            "down_point"     => 0.5, // ダウン値
            "damage_scaling" => 12,  // 補正値
        ),
    ),
    "特格(掴み)" => array(
        "掴み" => array(
            "damage"         => 40,  // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
    ),
    "特格(掴み爆発)" => array(
        "掴み" => array(
            "damage"         => 40,  // ダメージ
            "down_point"     => 0.3, // ダウン値
            "damage_scaling" => 15,  // 補正値
        ),
        "爆発" => array(
            "damage"         => 90,  // ダメージ
            "down_point"     => 1.0, // ダウン値
            "damage_scaling" => 12,  // 補正値
        ),
    ),
);