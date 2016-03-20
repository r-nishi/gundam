<!DOCTYPE html>
<html lang="ja">
<head>
    <?php echo $head ?>
</head>

<?php echo $drawer ?>

<body class="drawer drawer--left drawer--sidebar">
<section class="drawer-contents">
    <div class="container">
        <h1><div class="title"><?php echo HP_NAME ?></div></h1>
        <?php echo $content ?>
    </div>
</section>
<footer>
    <?php echo $footer ?>
</footer>
</body>
</html>