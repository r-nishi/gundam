<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="kq86V_frGPX2qFAuJ6hCRSOFl_k6kZLqcLvzbu03n-g" />
    <title>EXVSコンボサイト</title>
    <?php echo Asset::css('bootstrap.css'); ?>
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
        <h1>EXVSコンボサイト</h1>
    </div>
</header>
<hr/>
<div class="container">
    <a class="btn btn-primary" href="<?php echo URL ?>/top/index">TOP</a>
    <a class="btn btn-primary" href="<?php echo URL ?>/exvsfb/top/index">EXVSFB</a>
    <a class="btn btn-primary" href="<?php echo URL ?>/exvsmbon/top/index">EXVSMBON</a>
    <a class="btn btn-primary" href="<?php echo URL ?>/about/index">ABOUT</a>

    <h3>EXVSFB</h3>
    <p>コスト3000</p>
    <p><a href="<?php echo URL_EXVSFB ?>/turnx/index"><?php echo Asset::img('turnx.png') ?></a></p>
    <hr>
    <h3>EXVSMBON</h3>
    <p>コスト3000</p>
</div>
<footer>
</footer>
</body>
</html>
