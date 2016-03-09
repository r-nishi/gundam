<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ガンダムコンボサイト</title>
    <?php echo Asset::css('bootstrap.css') ?>
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
        <p>※開発途中です</p>
    </div>
</header>
<div class="container">
    <hr/>
    <h3>■ターンX</h3>
    <p><?php echo Asset::img('turnx.png') ?></p>
    <br>

    <p>コンボ計算</p>
    <!-- ▼Form▼ -->
    <?php $keep = 0 ?>
    <?php echo Form::open(array('action'=>'turnx/calculation','method'=>'post','name'=>'myForm')) ?>
        <div id="selectBox" style="display:flex; padding-bottom:10px;">
            <?php for($i = 1; $atk_cnt >= $i; $i++): ?>
                <?php if($i > 1): ?>
                    &nbsp>>&nbsp
                <?php endif ?>

                <!-- ▼1つのセレクトボックス▼ -->
                <select name="atk<?php echo $i ?>">
                    <option value="">選択</option>
                    <?php foreach($select_list as $value): ?>
                        <?php if(!empty($sum_name) && $value == $sum_name[$keep]): ?>
                            <option value="<?php echo $value ?>" name="<?php echo $value ?>" selected><?php echo $value ?></option>
                        <?php else: ?>
                            <option value="<?php echo $value ?>" name="<?php echo $value ?>"><?php echo $value ?></option>
                        <?php endif ?>
                    <?php endforeach; ?>
                </select>
                <!-- ▲1つのセレクトボックス▲ -->

                <?php $keep++ ?>
            <?php endfor ?>
        </div>

        <a class="btn btn-primary btn" onclick="addCheck()">追加</a>
        <a class="btn btn-primary btn">削除</a>
        <input class="btn btn-primary btn" type="submit" value="計算">
    <?php echo Form::close() ?>
    <!-- ▲Form▲ -->

    <?php
    if (!empty($sum_name)) {
        $cnt = count($sum_name);
        echo "<p><div>";
        foreach($sum_name as $value){
            $cnt--;
            echo $value;
            if($cnt > 0){
                echo ">>";
            }
        }
        echo "</p></div>";
    }
    if (!empty($sum_dame)) {
        echo "<p><div>合計ダメージ：".$sum_dame."</div></p>";
    }
    ?>
    <br />
    <p><a class="btn btn-primary btn-lg" href="../top/index">TOPに戻る</a></p>

    <div hidden id="hidden">
        <?php
        if(!empty($atk_cnt)) {
            echo $atk_cnt;
        } else {
            echo "1";
        }
        ?>
    </div>

</div>
<footer>
</footer>
</body>
<script type="text/javascript">
    // フォームを追加する
    function addCheck(){
        // セレクトボックスの数を取得
        var getNumbers = document.getElementById("hidden").innerHTML;
        // キャストしてインクリメント
        var numbers = parseInt(getNumbers) + 1;
        // 値を更新
        document.getElementById("hidden").innerHTML = numbers;

        // セレクトボックスを新規作成
        var makeHtmlCode =
            '&nbsp>> <select name="atk' + numbers + '">' +
                '<option value="">選択</option>' +
                '<?php foreach ($select_list as $key): ?>' +
                    '<option value="<?php echo $key ?>"><?php echo $key ?></option>' +
                '<?php endforeach ?>' +
            '</select>';

        // 新しいセレクトボックスを作るための<div>タグを作成
        var div_element = document.createElement("div");
        div_element.innerHTML = makeHtmlCode;

        // selectBoxに新規作成したセレクトボックスを追記する
        var select_box_element = document.getElementById("selectBox");
        select_box_element.appendChild(div_element);

    }

    // 念のため2つ目の方法を残しておく
    function addCheckPart2(){
        var makeHtmlCode = '<select onchange="addCheck();"><option value="">選択</option><?php foreach ($select_list as $key): ?><option value="<?php echo $key ?>"><?php echo $key ?></option><?php endforeach ?></select> >> ';
        var select_box_code = document.getElementById("selectBox").innerHTML;
        document.getElementById("selectBox").innerHTML = select_box_code + makeHtmlCode;
    }
</script>
</html>
