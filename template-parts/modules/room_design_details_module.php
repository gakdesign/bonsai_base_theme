<?php 
/**
 * #.# Room Design Module
 *
 * Related CSS: assets/css/modules/room_design_details_module.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding room_design_details_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php get_template_part('template-parts/snippets/content-block-intro'); ?>
      </div>
    </div>
    <div class="row row-eq-height gx-5">
      <?php if( have_rows('room_detail_items') ){ ?>
      <div class="details-slider">
        <?php while( have_rows('room_detail_items') ): the_row(); ?>
        <div class="div text-center">
          <div class="image-block">
            <?php 
              $image = get_sub_field('room_detail_image');
              if( !empty( $image ) ): ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
          <div class="content-block">
            <h3><?php echo get_sub_field('room_detail_header'); ?></h3>
            <?php echo get_sub_field('room_detail_description'); ?>
          </div>
        </div>

        <?php endwhile; ?>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
