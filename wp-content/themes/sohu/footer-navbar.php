<!--footer nav bar-->
<nav class="mui-bar mui-bar-tab footer-navbar ui-border-t">
  <a class="nav-item" href="<?php echo home_url(); ?>/">
    <span class="mui-icon back-img img-index"></span>
    <span class="mui-tab-label">明星楼盘</span>
  </a>
  <a class="nav-item" href="<?php echo home_url(); ?>/activities/">
    <span class="mui-icon back-img img-activities"></span>
    <span class="mui-tab-label">小狐送福</span>
  </a>
  <a class="nav-item" href="<?php echo home_url(); ?>/select/">
    <span class="mui-icon back-img img-select"></span>
    <span class="mui-tab-label">帮你配对</span>
  </a>
    <?php
    if (is_user_logged_in()) {
    ?>
  <a class="nav-item" href="<?php echo home_url(); ?>/person/">
      <?php
      } else {
      ?>
    <a class="nav-item" href="<?php echo home_url(); ?>/login/">
        <?php
        }
        ?>

      <span class="mui-icon back-img img-person"></span>
      <span class="mui-tab-label">我的</span>
    </a>
</nav>
