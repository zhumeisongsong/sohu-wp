<?php /* Template Name: person-center */ get_header(); ?>

    <main role="main">

      <div class="mui-content padding-top">
        <!--背景模糊-->
        <div class="blur">
          <!--个人信息-->
          <div class="user-box">
            <div class="profile-img">
              <img src="images/user@3x.png"/>
            </div>
            <div class="user-information" id="promptBtn">
              <span id="nick_name" class="nick-name" onkeyup="if(this.value.length>6){alert('length>6')}"/>用户</span>
              <span class="mui-icon mui-icon-compose icon-white"></span>
            </div>
          </div>
        </div>

      </div>

      <!--list start-->
      <div class="profile-list">
        <ul class="mui-table-view ">
          <li class="mui-table-view-cell" id="personal_info">
            <a class="mui-navigate-right" href="">
              个人资料
            </a>
          </li>
          <li class="mui-table-view-cell" id="change_pw">
            <a class="mui-navigate-right" href="<?php echo home_url(); ?>/lostpassword/">
              修改密码
            </a>
          </li>
          <li class="mui-table-view-cell" id="favourite">
            <a class="mui-navigate-right" href="javascript:;">
              我的收藏
            </a>
          </li>
          <li class="mui-table-view-cell" id="favourite">
            <a class="mui-navigate-right" href="javascript:;">
              已参加活动
            </a>
          </li>
        </ul>

        <ul class="mui-table-view log-out">
          <li class="mui-table-view-cell" id="logout">
            <a href="<?php echo wp_logout_url(home_url()); ?>">
              退出账号
            </a>
          </li>
        </ul>
      </div>
    </main>

<?php require_once(TEMPLATEPATH . '/footer-navbar.php'); ?>
<?php get_footer(); ?>