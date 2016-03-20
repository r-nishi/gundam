<!-- ハンバーガーボタン -->
<button type="button" class="drawer-toggle drawer-hamburger">
    <span class="sr-only">toggle navigation</span>
    <span class="drawer-hamburger-icon"></span>
</button>

<nav class="drawer-nav">
    <ul class="drawer-menu">
        <!-- ドロワーメニューの中身 -->
        <li><a href="<?php echo URL ?>/top/index"><?php echo TOP ?></a></li>
        <li class="drawer-dropdown">
            <a href="#" data-toggle="dropdown"><?php echo COST_3000 ?></a>
            <ul class="drawer-dropdown-menu">
                <li><a href="<?php echo URL_EXVSFB ?>/turnx/index"><?php echo TURN_X ?></a></li>
                <li><a href="<?php echo URL_EXVSFB ?>/bansheenorn/index"><?php echo BANSHEE_NORN ?></a></li>
            </ul>
        </li>
        <li><a href="<?php echo URL ?>/about/index"><?php echo ABOUT ?></a></li>
        <li><a href="<?php echo URL ?>/news/index"><?php echo NEWS ?></a></li>
    </ul>
</nav>
