<?php echo Asset::js('jquery-1.12.1.min.js') ?>
<?php echo Asset::js('iscroll.min.js') ?>
<script src="https://cdn.rawgit.com/ungki/bootstrap.dropdown/3.3.5/dropdown.min.js"></script>
<?php echo Asset::js('drawer.min.js') ?>
<script>
    $(document).ready(function() {
        $('.drawer').drawer();
    });
</script>