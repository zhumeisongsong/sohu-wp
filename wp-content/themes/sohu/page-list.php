<?php /* Template Name: activity-list */
get_header(); ?>

<main role="main">
  <div class="mui-content refresh-list">
    <!--数据列表-->
      <?php
      $args = array('post_type' => 'activity', 'posts_per_page' => 5);
      $loop = new WP_Query($args);
      echo ' <section class="mui-table-view activities-list">';
      while ($loop->have_posts()) :
          $loop->the_post();
          ?>

        <div class="list-item mui-table-view-cell no-padding"
             data-href="<?php echo get_post_meta($post->ID, '_detail_link', true) ?>">
          <div class="wrapper no-padding">
            <div class="cover-large img-con"><?php
                if (has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } else { ?><img
                  src="<?php echo get_template_directory_uri(); ?>/img/list-cover.png"><?php } ?>
            </div>

            <div class="item-info">
              <h2 class="title-text"><?php the_title(); ?></h2>
            </div>

            <div class="clear"></div>
          </div>
        </div>

          <?php
      endwhile;
      echo '</section>';
      ?>
  </div>

</main>
<?php require_once(TEMPLATEPATH . '/footer-navbar.php'); ?>
<?php get_footer(); ?>
