<?php 
/**
 * #.# Image Slider Module
 *
 * Related CSS: assets/css/modules/image_slider_module.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<?php
// Determine target post ID safely
$target_post_id = isset( $post->ID ) ? (int) $post->ID : get_the_ID();

// Generate slug-based class
$room_scheme_class = 'room-scheme-' . sanitize_title( get_post_field( 'post_name', $target_post_id ) );
?>
<section class="base-module-padding image_slider_module <?php echo esc_attr( $room_scheme_class ); ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php get_template_part('template-parts/snippets/content-block-intro'); ?>
      </div>
    </div>
  </div>
  <div class="image-slider-module">
    <?php if( have_rows('slider_images') ){ ?>
    <?php $i = 0; ?>
    <?php while( have_rows('slider_images') ): the_row(); ?>
      <div>
        <?php 
        $image = get_sub_field('slider_image');
        if( !empty( $image ) ): ?>
        <div class="image-block ratio-16x9">
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="object-fit-cover"/>
        </div>  
        <?php endif; ?>
      </div>
    <?php $i++;?>
    <?php endwhile; ?>
    <?php } else { ?>
    <?php } ?>
  </div>
</section>