<?php
/**
 * Featured Content Slider Module
 *
 * Fields: section_heading,
 *         slides (repeater): slide_image, slide_heading, slide_content, slide_cta_label, slide_cta_link
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/featured_content_slider_module.css
 * Related JS:  assets/js/main.js — .featured-gateway slider
 **/

defined( 'ABSPATH' ) || exit;

$section_heading = get_sub_field('section_heading');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="featured-content-slider-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
  <div class="container">

    <?php if ( $section_heading ) : ?>
      <div class="row">
        <div class="col-lg-12">
          <h2><?php echo esc_html( $section_heading ); ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( have_rows('slides') ) : ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="featured-gateway">
            <?php while ( have_rows('slides') ) : the_row();
              $slide_image     = get_sub_field('slide_image');
              $slide_heading   = get_sub_field('slide_heading');
              $slide_content   = get_sub_field('slide_content');
              $slide_cta_label = get_sub_field('slide_cta_label');
              $slide_cta_link  = get_sub_field('slide_cta_link');
            ?>
              <div class="featured-slide">
                <?php if ( $slide_image ) : ?>
                  <div class="slide-image">
                    <img
                      src="<?php echo esc_url( $slide_image['url'] ); ?>"
                      alt="<?php echo esc_attr( $slide_image['alt'] ); ?>"
                      loading="lazy"
                      class="img-res"
                    >
                  </div>
                <?php endif; ?>
                <div class="slide-content">
                  <?php if ( $slide_heading ) : ?>
                    <h3><?php echo esc_html( $slide_heading ); ?></h3>
                  <?php endif; ?>
                  <?php if ( $slide_content ) : ?>
                    <div class="slide-text"><?php echo wp_kses_post( $slide_content ); ?></div>
                  <?php endif; ?>
                  <?php if ( $slide_cta_label && $slide_cta_link ) : ?>
                    <a href="<?php echo esc_url( $slide_cta_link ); ?>" class="btn btn-primary"><?php echo esc_html( $slide_cta_label ); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>
