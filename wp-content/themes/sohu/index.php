<?php get_header(); ?>

<main role="main">
  <div class="mui-content refresh-list"
  <section class="search-con">
    <a href="">
    </a>
  </section>
  <!--header banner-->
  <header class="swiper-container">
    <div class="swiper-wrapper">
        <?php
        $args = array(
            'post_type' => 'banner',
            'posts_per_page' => 5,
            'meta_key' => '_recommend_id',
            'orderby' => 'meta_value_num',
            'order' => 'asc',
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()):
            $loop->the_post();
            ?>
          <div class="swiper-slide img-con"
               data-href="<?php echo get_post_meta($post->ID, '_detail_link', true) ?>">
              <?php
              if (has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } else { ?><img
                src="<?php echo get_template_directory_uri(); ?>/img/list-cover.png" alt="swiper-img"><?php }
              ?>
          </div>
            <?php
        endwhile;
        wp_reset_query();
        ?>

    </div>
    <div class="swiper-pagination"></div>
  </header>

  <!--sohu focus-->
  <section class="focus-container ui-border-b">
    <div class="title-con img-con">
      <img src="<?php echo get_template_directory_uri(); ?>/img/focus-title.png" alt="狐享会头条">
    </div>
    <div class="scroll-con" id="scroll_con">
      <section>
          <?php
          $args = array(
              'post_type' => 'news',
              'posts_per_page' => 5,
          );
          $loop = new WP_Query($args);
          while ($loop->have_posts()):
              $loop->the_post();
              ?>
            <div class="scroll-cell"
                 data-href="<?php echo get_post_meta($post->ID, '_detail_link', true) ?>"><?php the_title(); ?></div>
              <?php
          endwhile;
          wp_reset_query();
          ?>
      </section>
    </div>
  </section>
  <div class="clear"></div>

  <!--recommend buiding-->
  <div class="recommend-container">
    <h1>推荐楼盘</h1>

      <?php
      $args = array(
          'post_type' => 'building',
//              'posts_per_page' => 10,
          'meta_key' => '_recommend_id',
          'orderby' => 'meta_value_num',
          'order' => 'asc',
          'paged' => $paged,
          'showposts' => '1',
      );
      $loop = new WP_Query($args);
      echo '<div class="list-con mui-table-view">';
      while ($loop->have_posts())
          :$loop->the_post();
          ?>
        <div class="list-item mui-table-view-cell no-padding">

          <div class="list-badge no-collect" id="collect_button">关注</div>
          <div class="wrapper list-tap" data-href="<?php echo get_post_meta($post->ID, '_detail_link', true) ?>">
            <div class="cover-large img-con">
                <?php
                if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail(); ?>
                <?php } else {
                    ?><img src="<?php echo get_template_directory_uri(); ?>/img/list-cover.png"
                           alt="cover"><?php }
                ?>
            </div>
            <div class="item-info">
              <h2 class="title-text"><?php the_title(); ?></h2>
              <h3 class="location-text"><?php echo get_post_meta($post->ID, '_location', true) ?></h3>
              <div class="price-con">
                <a class="phone-num img-con"
                   href="tel:<?php echo get_post_meta($post->ID, '_contact_num', true) ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/icon/icon-phone.png" alt="icon-phone">
                </a>
                约<span><?php echo get_post_meta($post->ID, '_unit_price', true) ?></span>元/㎡
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
          <?php
      endwhile;
      wp_reset_query();
      echo '</div>';
      ?>

  </div>
  <div class="pagenavi-btn">
    <span class="next-btn"><?php par_pagenavi(10); ?></span>
  </div>
    <?php wp_reset_query() ?>

  </div>

</main>
<?php require_once(TEMPLATEPATH . '/footer-navbar.php'); ?>
<?php get_footer(); ?>

