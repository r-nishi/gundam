<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ガンダムコンボサイト</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::js('downCheck.js') ?>
    <style>
        a{
            color: #883ced;
        }
        a:hover{
            color: #af4cf0;
        }
        .btn.btn-primary{color:#ffffff!important;background-color:#883ced;background-repeat:repeat-x;background-image:-khtml-gradient(linear, left top, left bottom, from(#fd6ef7), to(#883ced));background-image:-moz-linear-gradient(top, #fd6ef7, #883ced);background-image:-ms-linear-gradient(top, #fd6ef7, #883ced);background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fd6ef7), color-stop(100%, #883ced));background-image:-webkit-linear-gradient(top, #fd6ef7, #883ced);background-image:-o-linear-gradient(top, #fd6ef7, #883ced);background-image:linear-gradient(top, #fd6ef7, #883ced);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fd6ef7', endColorstr='#883ced', GradientType=0);text-shadow:0 -1px 0 rgba(0, 0, 0, 0.25);border-color:#883ced #883ced #003f81;border-color:rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);}
        body { margin: 0px 0px 40px 0px; }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>ガンダムコンボサイト</h1>
        <p>主にEXVSFBのTX</p>
        <p>※開発途中です</p>
    </div>
</header>
<div class="container">
    <hr/>
    <p>ターンX</p>

    <?php echo Form::open(array('action'=>'turnx/calculation','method'=>'post','name'=>'myForm')) ?>

        <select name="mySelect" onchange="downCheck();">
            <option value="">選択</option>
            <?php foreach ($select_list as $key): ?>
                <option value="<?php echo $key ?>"><?php echo $key ?></option>
            <?php endforeach ?>
        </select>
        >>

        <input type="submit" value="計算">
    <?php echo Form::close() ?>

    <?php
    if (!empty($sum_dame)) {
        echo "<p>合計ダメージ：".$sum_dame."</p>";
    }
    ?>
    <br />
    <p><a class="btn btn-primary btn-lg" href="../top">TOPに戻る</a></p>
    <footer>
    </footer>
</div>
</body>
</html>
