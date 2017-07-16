<?php /* Template Name:select-score */
get_header(); ?>

<main role="main">
  <header class="select-header">
    <nav>
      <img src="<?php echo get_template_directory_uri(); ?>/img/select-progress.png" alt="nav">
    </nav>
    <section class="header-main">
      <h3>您的购房能力:</h3>
      <div class="score-star">
        <div class="icons mui-inline score-star" style="margin-left: 6px;">
          <i data-index="1" class="mui-icon mui-icon-star"></i>
          <i data-index="2" class="mui-icon mui-icon-star"></i>
          <i data-index="3" class="mui-icon mui-icon-star"></i>
          <i data-index="4" class="mui-icon mui-icon-star"></i>
          <i data-index="5" class="mui-icon mui-icon-star"></i>
        </div>
      </div>
      <div class="score-text">
        <h2 class="score-key"></h2>
        <div class="score-info"></div>
      </div>
    </section>
  </header>

  <div class="mui-content">

    <section class="price-info">
      <h2>您可以</h2>
      <div class="price-text">
        <div class="total-price">
          <span class="price-title">购买总价</span>
          <span class="text-advanced total-price-top text-num"></span>
          <span class="text-advanced">万</span>
          <span class="text-normal">以内的房子</span>
        </div>
        <div class="pre-price">
          <span class="price-title">购买单价</span>
          <span class="text-advanced pre-price-key-down text-num"></span>
          <span class="text-advanced">-</span>
          <span class="text-advanced pre-price-key-up text-num"></span>
          <span class="text-advanced">元/平</span>
          <span class="text-normal">以内的房子</span>
        </div>
        <div class="price-tips">注：本次评估仅适用于购买首套普通住宅，如非首套房，还需要考虑市场政策和开发商的特殊首付要求，如您购买二手房，还需要考虑个人所得税，契税，营业税等相关问题。</div>
      </div>

    </section>
    <section class="footer-recommend">
      <h2>为您推荐</h2>
      <div class="like-list">

      </div>
    </section>
  </div>

  <!--  打星标准：-->
  <!--  80万以下：三星-->
  <!--  80-120万：四星-->
  <!--  120万以上：五星-->
  <!--推荐标准 区域 户型 面积 总价-->
</main>

<?php get_footer(); ?>
