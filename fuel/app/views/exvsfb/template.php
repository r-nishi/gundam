<!DOCTYPE html>
<html lang="ja">
<head>
    <?php echo $meta ?>
    <meta name="keyword" content="<?php echo $meta_keyword ?>">
    <meta name="description" content="<?php echo $meta_description ?>">
    <title><?php echo $title ?></title>
    <?php echo $css ?>
</head>

<body class="drawer drawer--left drawer--sidebar">

<header role="banner">
  <?php echo $header ?>
</header>

<!-- content -->
<main role="main" class="drawer-contents">
  <div class="title"><?php echo HP_NAME ?></div>
  <div class="container">
    <?php echo $content ?>
  </div>
</main>

<?php echo $script ?>

</body>
</html>
