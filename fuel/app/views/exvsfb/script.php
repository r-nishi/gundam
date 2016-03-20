<?php echo Asset::js('jquery-1.12.1.min.js') ?>
<?php echo Asset::js('iscroll.min.js') ?>
<?php echo Asset::js('dropdown.min.js') ?>
<?php echo Asset::js('drawer.min.js') ?>
<?php echo Asset::js('common.js') ?>
<script>
    $(document).ready(function() {
        $('.drawer').drawer();
    });
</script>