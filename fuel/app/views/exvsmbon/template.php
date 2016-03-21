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
  <div class="title"><?php echo HP_NAME_MBON ?></div>
  <div class="container">
    <?php echo $content ?>
  </div>
</main>

<?php echo $script ?>

</body>
</html>
