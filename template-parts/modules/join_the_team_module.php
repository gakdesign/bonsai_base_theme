<?php 
/**
 * #.# Join The Team Module
 *
 * Related CSS: assets/css/modules/join_the_team_module.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding join_the_team_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="join-us-block content-block content-block-linked-white">
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <?php if(get_sub_field('set_header_to_h1')) { ?>
                <h1><?php echo get_sub_field('section_header'); ?></h1>
              <?php } else { ?>
                <h2><?php echo get_sub_field('section_header'); ?></h2>
              <?php } ?>
              <?php echo get_sub_field('section_introduction'); ?>
            </div>
            <div class="col-lg-1"></div>
          </div>
          
          <?php $args = array(
          'post_type' => 'vacancy',
          'post_status' => 'publish',
          'posts_per_page' => 1,
          );
          $loop = new WP_Query( $args );
          if ( $loop->have_posts() ) {
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="job-item">
                <?php if(get_field('job_title')) { ?>
                  <h3><?php echo get_sub_field('job_title'); ?></h3>
                <?php } else { ?>
                  <h3><?php the_title();?></h3>
                <?php } ?>
                <?php echo get_field('job_description'); ?>
            </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
