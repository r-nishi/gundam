<button type="button" class="drawer-toggle drawer-hamburger">
  <span class="sr-only">toggle navigation</span>
  <span class="drawer-hamburger-icon"></span>
</button>

<nav class="drawer-nav" role="navigation">
    <ul class="drawer-menu">
        <li><a class="drawer-brand" href="<?php echo URL_EXVSMBON ?>"><?php echo EXVSMBON ?></a></li>
        <li class="drawer-dropdown">
            <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php echo COST_3000 ?> <span class="drawer-caret"></span>
            </a>
        </li>
        <li class="drawer-dropdown">
            <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php echo COST_2500 ?> <span class="drawer-caret"></span>
            </a>
        </li>
        <li class="drawer-dropdown">
            <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php echo COST_2000 ?> <span class="drawer-caret"></span>
            </a>
            <ul class="drawer-dropdown-menu">
                <li><a class="drawer-dropdown-menu-item" href="<?php echo URL_EXVSMBON ?>/barbatos"><?php echo BARBATOS ?></a></li>
            </ul>
        </li>
        <li class="drawer-dropdown">
            <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php echo COST_1500 ?> <span class="drawer-caret"></span>
            </a>
        </li>
        <li><a class="drawer-menu-item" href="<?php echo URL_EXVSMBON ?>/about"><?php echo ABOUT ?></a></li>
        <li><a class="drawer-menu-item" href="<?php echo URL_EXVSMBON ?>/news"><?php echo NEWS ?></a></li>
    </ul>
</nav>
