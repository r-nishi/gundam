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

<!-- GoogleAnalytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-37067289-4', 'auto');
    ga('send', 'pageview');

</script>