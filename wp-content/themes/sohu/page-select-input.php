<?php /* Template Name:select-input */
get_header(); ?>

<main role="main">
  <header class="select-header">
      <nav>
        <img src="<?php echo get_template_directory_uri(); ?>/img/select-progress.png" alt="nav">
      </nav>
  </header>

  <div class="mui-content">
    <section class="label-con">
      <h2 class="title-con">您当前的购房资金（填写数字）</h2>
      <div class="mui-row">
        <div class="mui-col-xs-12">
          <input type="number">
          <span>万元</span>
        </div>

      </div>
    </section>

    <section class="label-con">
      <h2 class="title-con">您期望的贷款年限（单选）</h2>
      <div class="mui-row">
        <div class="mui-col-xs-4">
          <section class="label-wrapper">
            <label class="mui-btn label-btn" for="purpose_marry">
              <input type="radio" name="doc-js-btn" id="purpose_marry" class="label-perpose"> 5年及以下
            </label>
          </section>
        </div>
        <div class="mui-col-xs-4">
          <section class="label-wrapper">
            <label class="mui-btn label-btn" for="purpose_baby">
              <input type="radio" name="doc-js-btn" id="purpose_baby" class="label-perpose">10年
            </label>
          </section>
        </div>
        <div class="mui-col-xs-4">
          <section class="label-wrapper">
            <label class="mui-btn label-btn" for="purpose_old">
              <input type="radio" name="doc-js-btn" id="purpose_old" class="label-perpose">15年
            </label>
          </section>
        </div>
        <div class="mui-col-xs-4">
          <section class="label-wrapper">
            <label class="mui-btn label-btn" for="purpose_school">
              <input type="radio" name="doc-js-btn" id="purpose_school" class="label-perpose">20年
            </label>
          </section>
        </div>
        <div class="mui-col-xs-4">
          <section class="label-wrapper">
            <label class="mui-btn label-btn" for="purpose_bigger">
              <input type="radio" name="doc-js-btn" id="purpose_bigger" class="label-perpose">25年
            </label>
          </section>
        </div>
        <div class="mui-col-xs-4">
          <section class="label-wrapper">
            <label class="mui-btn label-btn" for="purpose_home">
              <input type="radio" name="doc-js-btn" id="purpose_home" class="label-perpose">30年
            </label>
          </section>
        </div>
      </div>
    </section>

    <section class="label-con">
      <h2 class="title-con">您每月可用于购房的支出（填写数字）</h2>
      <div class="mui-row">
        <div class="mui-col-xs-12">
          <input title="pay_month" type="number">
          <span>元</span>
        </div>

      </div>
    </section>
  </div>

  <footer class="submit-btn" data-href="<?php echo home_url(); ?>/index.php/selectscore/">
    <button type="button" class="mui-btn mui-btn-block submit-loading mui-btn-primary btn-standard">下一步</button>
  </footer>

  <!--  打星标准：-->
  <!--  80万以下：三星-->
  <!--  80-120万：四星-->
  <!--  120万以上：五星-->
</main>

<?php get_footer(); ?>
