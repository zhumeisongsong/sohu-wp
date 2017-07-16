<!doctype html>
<html class="no-js" lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width initial-scale=1, maximum-scale=1, user-scalable=no"/>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <!--不识别电话号码和邮箱-->
  <meta name="format-detection" content="telephone=no; email=no"/>
  <!--网站开启对 web app 程序的支持-->
  <meta name="apple-mobile-web-app-capable" content="yes"/>
  <!--状态栏颜色-->
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- windows phone 点击无高光 -->
  <meta name="msapplication-tap-highlight" content="no">
  <!-- uc强制竖屏 -->
  <meta name="screen-orientation" content="portrait">
  <!-- QQ强制竖屏 -->
  <meta name="x5-orientation" content="portrait">
  <!-- UC强制全屏 -->
  <meta name="full-screen" content="yes">
  <!-- QQ强制全屏 -->
  <meta name="x5-fullscreen" content="true">
  <!-- UC应用模式 -->
  <meta name="browsermode" content="application">
  <!-- QQ应用模式 -->
  <meta name="x5-page-mode" content="app">
  <!-- 使用 webkit 引擎渲染 -->
  <meta name="renderer" content="webkit">
  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <title>狐享会</title>
  <!--css-->
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheet/mui.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheet/swiper.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheet/style.css">

  <title>
      <?php wp_title(''); ?><?php if (wp_title('', false)) {
          echo ' :';
      } ?><?php bloginfo('name'); ?>
  </title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header clear" role="banner">
  <!-- logo -->
  <div class="logo">
    <a href="<?php echo home_url(); ?>">
      <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
<!--      <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/logo.svg" alt="Logo" class="logo-img">-->
    </a>
  </div>
  <!-- /logo -->

</header>

