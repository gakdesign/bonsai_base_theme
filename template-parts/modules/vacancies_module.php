<?php 
/**
 * #.# Vanacies Module
 *
 * Related CSS: assets/css/modules/vacancies_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding vacancies_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ">
        <div class="content-block top-section-block">
          <?php if(get_sub_field('set_header_to_h1')) { ?>
            <h1><?php echo get_sub_field('section_header'); ?></h1>
          <?php } else { ?>
            <h2><?php echo get_sub_field('section_header'); ?></h2>
          <?php } ?>
          <?php echo get_sub_field('section_introduction'); ?>
        </div>
      </div>
    </div>

<?php
$args = array(
  'post_type'      => 'vacancy',
  'post_status'    => 'publish',
  'posts_per_page' => -1, // -11 was invalid, use -1 for unlimited
);
$loop = new WP_Query($args);

if ($loop->have_posts()) :
  $i = 0; // counter
  while ($loop->have_posts()) : $loop->the_post();
    $i++;
    ?>
    <div class="row gx-3 row-equal-height">
      <?php if ($i % 2 !== 0) : ?>
        <!-- Odd rows: Content left, Image right -->
        <div class="col-lg-6">
          <div class="content-grid">
            <div class="content-block content-block-linked-white">
              <?php if (get_field('job_title')) : ?>
                <h3><?php echo esc_html(get_field('job_title')); ?></h3>
              <?php else : ?>
                <h3><?php the_title(); ?></h3>
              <?php endif; ?>

              <?php echo wp_kses_post(get_field('job_description')); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="image-block image-full">
            <?php the_post_thumbnail('full'); ?>
          </div>
        </div>
      <?php else : ?>
        <!-- Even rows: Image left, Content right -->
        <div class="col-lg-6 hide-900">
          <div class="image-block image-full">
            <?php the_post_thumbnail('full'); ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="content-grid">
            <div class="content-block content-block-linked-white">
              <?php if (get_field('job_title')) : ?>
                <h3><?php echo esc_html(get_field('job_title')); ?></h3>
              <?php else : ?>
                <h3><?php the_title(); ?></h3>
              <?php endif; ?>

              <?php echo wp_kses_post(get_field('job_description')); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 show-900-flex">
          <div class="image-block image-full">
            <?php the_post_thumbnail('full'); ?>
          </div>
        </div>
        
      <?php endif; ?>
    </div>
  <?php
  endwhile;
  wp_reset_postdata();
endif;
?>


    </div>
  </div>
</section>
