<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title><?php HP_NAME ?></title>
<?php echo Asset::js('common.js') ?>
<?php echo Asset::js('jquery-1.12.1.min.js') ?>
<?php echo Asset::js('iscroll.min.js') ?>
<?php echo Asset::js('drawer.min.js') ?>
<script src="https://cdn.rawgit.com/ungki/bootstrap.dropdown/3.3.5/dropdown.min.js"></script>

<?php echo Asset::css('drawer.min.css') ?>
<?php //echo Asset::css('bootstrap.css') ?>
<?php echo Asset::css('common.css') ?>

<script>
    $(document).ready(function() {
        $('.drawer').drawer(

        );
    });
</script>