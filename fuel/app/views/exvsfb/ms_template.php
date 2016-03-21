<!DOCTYPE html>
<html lang="ja">
<head>
  <?php echo $head ?>
</head>

<body class="drawer drawer--left drawer--sidebar">

<header role="banner">
  <?php echo $header ?>
</header>

<!-- content -->
<main role="main" class="drawer-contents">
  <div class="title"><?php echo HP_NAME ?></div>
  <div class="container">
      <div>
          <h1><a href="./index"><?php echo $ms_name ?></a></h1>
          <p><?php //echo Asset::img('ms/turnx.png') ?></p>
          <hr>
          <h4>■コンボ計算</h4>
          <!-- ▼Form▼ -->
          <?php $keep = 0 ?>
          <?php echo Form::open(array('action'=> URL_EXVSFB.'/'.$path_name.'/calculation','method'=>'post','name'=>'myForm')) ?>
          覚醒選択<br>
          <select name="awakening">
              <option value="">覚醒ナシ</option>
              <?php if (!empty($awakening) && $awakening == "assault") : ?>
                  <option value="assault" selected>A覚醒</option>
              <?php else: ?>
                  <option value="assault">A覚醒</option>
              <?php endif ?>
              <?php if (!empty($awakening) && $awakening == "blast") : ?>
                  <option value="blast" selected>B覚醒</option>
              <?php else: ?>
                  <option value="blast">B覚醒</option>
              <?php endif ?>
          </select>
          <br>
          <br>
          コンボ選択
          <div id="selectBox" style="display:block; padding-bottom:10px;">
              <?php for($i = 1; $atk_cnt >= $i; $i++): ?>
                  <!-- ▼1つのセレクトボックス▼ -->
                  <div id="atk<?php echo $i ?>">
                      <?php if($i > 1): ?>
                          &nbsp>>&nbsp
                      <?php endif ?>
                      <select name="atk<?php echo $i ?>">
                          <option value="">選択</option>
                          <?php foreach($select_list as $value): ?>
                              <?php if(!empty($sum_name) && $value == @$sum_name[$keep]): ?>
                                  <option value="<?php echo $value ?>" name="<?php echo $value ?>" selected><?php echo $value ?></option>
                              <?php else: ?>
                                  <option value="<?php echo $value ?>" name="<?php echo $value ?>"><?php echo $value ?></option>
                              <?php endif ?>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <!-- ▲1つのセレクトボックス▲ -->

                  <?php $keep++ ?>
              <?php endfor ?>
          </div>

          <a class="btn btn-primary btn" onclick="addCheck()">追加</a>
          <a class="btn btn-primary btn" onclick="delCheck()">削除</a>
          <input class="btn btn-primary btn" type="submit" value="計算">
          <?php echo Form::close() ?>
          <!-- ▲Form▲ -->

          <hr>
          <h4>■計算結果</h4>
          <div>選択コンボ：
              <?php
              if (!empty($sum_name)) {
                  $cnt = count($sum_name);
                  foreach($sum_name as $value){
                      $cnt--;
                      echo $value;
                      if($cnt > 0){
                          echo ">>";
                      }
                  }
              }
              ?>
          </div>

          <div>合計ダメージ：
              <?php
              if (!empty($sum_dame)) {
                  echo $sum_dame;
              }
              ?>
          </div>

          <div>合計ダウン値：
              <?php
              if (!empty($sum_down)) {
                  echo $sum_down;
              }
              ?>
          </div>

          <hr>
          <div hidden id="hidden">
              <?php
              if(!empty($atk_cnt)) {
                  echo $atk_cnt;
              } else {
                  echo "1";
              }
              ?>
          </div>

          <?php echo $content ?>
          <hr>
      </div>
  </div>
</main>

<script>
    // フォームを追加する
    function addCheck(){
        // セレクトボックスの数を取得
        var getNumbers = document.getElementById("hidden").innerHTML;
        // キャストしてインクリメント
        var numbers = parseInt(getNumbers) + 1;
        // 値を更新
        document.getElementById("hidden").innerHTML = numbers;

        // 存在確認
        var chk = document.getElementById("atk" + numbers);
        if (chk == null) {
            // セレクトボックスを新規作成
            var makeHtmlCode =
                '&nbsp>>&nbsp&nbsp<select name="atk' + numbers + '">' +
                '<option value="">選択</option>' +
                '<?php foreach ($select_list as $key): ?>' +
                '<option value="<?php echo $key ?>"><?php echo $key ?></option>' +
                '<?php endforeach ?>' +
                '</select>';

            // 新しいセレクトボックスを作るための<div>タグを作成
            var div_element = document.createElement("div");
            div_element.id = "atk" + numbers;
            div_element.innerHTML = makeHtmlCode;

            // selectBoxに新規作成したセレクトボックスを追記する
            var select_box_element = document.getElementById("selectBox");
            select_box_element.appendChild(div_element);
        } else {
            // セレクトボックスを新規作成
            var makeHtmlCode =
                '&nbsp>>&nbsp&nbsp<select name="atk' + numbers + '">' +
                '<option value="">選択</option>' +
                '<?php foreach ($select_list as $key): ?>' +
                '<option value="<?php echo $key ?>"><?php echo $key ?></option>' +
                '<?php endforeach ?>' +
                '</select>';
            chk.innerHTML = makeHtmlCode;
        }
    }
</script>
<?php echo $script ?>

</body>
</html>
