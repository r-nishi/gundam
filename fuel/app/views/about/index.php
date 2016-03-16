<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo HP_NAME ?></title>
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
        <h1><?php echo HP_NAME ?></h1>
    </div>
</header>
<hr>
<div class="container">
    <a class="btn btn-primary" href="<?php echo URL ?>/top/index">TOP</a>
    <a class="btn btn-primary" href="<?php echo URL ?>/exvsfb/top/index">EXVSFB</a>
    <a class="btn btn-primary" href="<?php echo URL ?>/exvsmbon/top/index">EXVSMBON</a>
    <a class="btn btn-primary" href="<?php echo URL ?>/about/index">ABOUT</a>

    <h3>■概要</h3>
    サイト名：<?php echo HP_NAME ?>（暫定）<br>
    管理人：24P<br>
    URL：http://hisuichan.com/gundam/public/top<br>
    GitHub：https://github.com/r-nishi/gundam.git<br>
    <br>
    当サイトは、EXVSFB,EXVSMBONの各機体のコンボダメージを計算するサイトです<br>
    GitHubにてソースコードを公開しているので追加機体などありましたら気軽にプルリクエストしてください<br>
    みなさんと共に機体の研究ができたら幸いです<br>
    <br>
    <h3>■免責</h3>
    当サイトに掲載している動画及び画像などのコンテンツに関する著作権は各権利所有者に帰属致します<br>
    当サイトは著作権の侵害を目的としたサイトではございません<br>
    もし掲載内容について問題がある場合は、お手数ですが各権利所有者様が下記連絡先にご連絡下さい<br>
    確認後、速やかに対応させていただきます<br>
    <br>
    <h3>■リンクについて</h3>
    当サイトはリンクフリーです<br>
    <br>
    <h3>■コンタクト</h3>
    下記Twitter垢までお気軽にご連絡ください<br>
    https://twitter.com/Ryu24P<br>
    <br>
    <p><a class="btn btn-primary" href="<?php echo URL ?>/top/index">TOPに戻る</a></p>
</div>
<footer>
</footer>
</body>
</html>
