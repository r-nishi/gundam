<!DOCTYPE html>
<html lang="ja" class="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sandbox: Drawer Left with sidebar</title>

    <?php echo Asset::css('sandbox.css') ?>
    <?php echo Asset::css('drawer.min.css') ?>

</head>
<body class="drawer drawer--left drawer--sidebar">

<header role="banner">
    <button type="button" class="drawer-toggle drawer-hamburger">
        <span class="sr-only">toggle navigation</span>
        <span class="drawer-hamburger-icon"></span>
    </button>

    <nav class="drawer-nav" role="navigation">
        <ul class="drawer-menu">
            <li><a class="drawer-brand" href="./index.html">Drawer</a></li>
            <li><a class="drawer-menu-item" href="./top.html">Top</a></li>
            <li><a class="drawer-menu-item" href="./index.html">Left</a></li>
            <li><a class="drawer-menu-item" href="./right.html">Right</a></li>
            <li class="drawer-dropdown">
                <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                    Navbar <span class="drawer-caret"></span>
                </a>
                <ul class="drawer-dropdown-menu">
                    <li><a class="drawer-dropdown-menu-item" href="./navbar-top.html">Top</a></li>
                    <li><a class="drawer-dropdown-menu-item" href="./navbar-left.html">Left</a></li>
                    <li><a class="drawer-dropdown-menu-item" href="./navbar-right.html">Right</a></li>
                </ul>
            </li>
            <li class="drawer-dropdown">
                <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                    Fixed navbar <span class="drawer-caret"></span>
                </a>
                <ul class="drawer-dropdown-menu">
                    <li><a class="drawer-dropdown-menu-item" href="./fixed-navbar-top.html">Top</a></li>
                    <li><a class="drawer-dropdown-menu-item" href="./fixed-navbar-left.html">Left</a></li>
                    <li><a class="drawer-dropdown-menu-item" href="./fixed-navbar-right.html">Right</a></li>
                </ul>
            </li>
            <li class="drawer-dropdown">
                <a class="drawer-menu-item" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                    Sidebar <span class="drawer-caret"></span>
                </a>
                <ul class="drawer-dropdown-menu">
                    <li><a class="drawer-dropdown-menu-item" href="./sidebar-left.html">Left</a></li>
                    <li><a class="drawer-dropdown-menu-item" href="./sidebar-right.html">Right</a></li>
                </ul>
            </li>
            <li style="height:500px"><span class="drawer-menu-item" >height:500px box</span></li>
            <li><span class="drawer-menu-item" >box end</span></li>
        </ul>
    </nav>
</header>

<!-- content -->
<main role="main" class="drawer-contents">
    <section class="item bg-amber">
        <h1>Drawer Left with Sidebar</h1>
    </section>
</main>

<?php echo Asset::js('jquery-1.12.1.min.js') ?>
<?php echo Asset::js('iscroll.min.js') ?>
<script src="https://cdn.rawgit.com/ungki/bootstrap.dropdown/3.3.5/dropdown.min.js"></script>
<?php echo Asset::js('drawer.min.js') ?>
<script>
    $(document).ready(function() {
        $('.drawer').drawer();
    });
</script>

</body>
</html>
