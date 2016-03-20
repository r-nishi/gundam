<button type="button" class="drawer-toggle drawer-hamburger">
  <span class="sr-only">toggle navigation</span>
  <span class="drawer-hamburger-icon"></span>
</button>

<nav class="drawer-nav" role="navigation">
  <ul class="drawer-menu">
    <li><a class="drawer-brand" href="./index.html">Drawer</a></li>
    <li><a class="drawer-menu-item" href="<?php echo URL ?>/top/index"><?php echo TOP ?></a></li>
    <li class="drawer-dropdown">
      <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
        <?php echo COST_3000 ?> <span class="drawer-caret"></span>
      </a>
      <ul class="drawer-dropdown-menu">
        <li><a class="drawer-dropdown-menu-item" href="<?php echo URL_EXVSFB ?>/turnx/index"><?php echo TURN_X ?></a></li>
        <li><a class="drawer-dropdown-menu-item" href="<?php echo URL_EXVSFB ?>/bansheenorn/index"><?php echo BANSHEE_NORN ?></a></li>
      </ul>
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
    </li>
    <li class="drawer-dropdown">
      <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
        <?php echo COST_1000 ?> <span class="drawer-caret"></span>
      </a>
    </li>
    <li><a class="drawer-menu-item" href="<?php echo URL ?>/about/index"><?php echo ABOUT ?></a></li>
    <li><a class="drawer-menu-item" href="<?php echo URL ?>/news/index"><?php echo NEWS ?></a></li>
  </ul>
</nav>
