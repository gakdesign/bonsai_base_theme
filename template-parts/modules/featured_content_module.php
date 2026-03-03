<?php
/**
 * Featured Content Module
 *
 * Fields: section_heading, section_content, featured_image,
 *         cta_label, cta_link, image_position (true_false – image left),
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/featured_content_module.css
 * Related JS:  assets/js/main.js
 **/

$section_heading = get_sub_field('section_heading');
$section_content = get_sub_field('section_content');
$featured_image  = get_sub_field('featured_image');
$cta_label       = get_sub_field('cta_label');
$cta_link        = get_sub_field('cta_link');
$image_left      = get_sub_field('image_position');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';

$order_image   = $image_left ? 'order-lg-1' : 'order-lg-2';
$order_content = $image_left ? 'order-lg-2' : 'order-lg-1';
?>

<section class="featured-content-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
  <div class="container">
    <div class="row align-items-center">

      <?php if ( $featured_image ) : ?>
        <div class="col-lg-6 <?php echo esc_attr( $order_image ); ?>">
          <div class="featured-image">
            <img
              src="<?php echo esc_url( $featured_image['url'] ); ?>"
              alt="<?php echo esc_attr( $featured_image['alt'] ); ?>"
              loading="lazy"
              class="img-res"
            >
          </div>
        </div>
      <?php endif; ?>

      <div class="col-lg-<?php echo $featured_image ? '6' : '12'; ?> <?php echo esc_attr( $order_content ); ?>">

        <?php if ( $section_heading ) : ?>
          <h2><?php echo esc_html( $section_heading ); ?></h2>
        <?php endif; ?>

        <?php if ( $section_content ) : ?>
          <div class="section-content"><?php echo wp_kses_post( $section_content ); ?></div>
        <?php endif; ?>

        <?php if ( $cta_label && $cta_link ) : ?>
          <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn-primary"><?php echo esc_html( $cta_label ); ?></a>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
