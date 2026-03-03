<?php
/**
 * Image Gallery Slider Module
 *
 * Fields: section_heading, gallery_images (gallery),
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/image_gallery_slider_module.css
 * Related JS:  assets/js/main.js — galleryslider-for / galleryslider-nav
 **/

defined( 'ABSPATH' ) || exit;

$section_heading = get_sub_field('section_heading');
$gallery_images  = get_sub_field('gallery_images');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="image-gallery-slider-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
  <div class="container">

    <?php if ( $section_heading ) : ?>
      <div class="row">
        <div class="col-lg-12">
          <h2><?php echo esc_html( $section_heading ); ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( $gallery_images ) : ?>
      <div class="row">
        <div class="col-lg-9">
          <div class="galleryslider-for">
            <?php foreach ( $gallery_images as $image ) : ?>
              <div class="gallery-slide">
                <img
                  src="<?php echo esc_url( $image['sizes']['large'] ); ?>"
                  alt="<?php echo esc_attr( $image['alt'] ); ?>"
                  loading="lazy"
                  class="img-res"
                >
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="galleryslider-nav">
            <?php foreach ( $gallery_images as $image ) : ?>
              <div class="gallery-thumb">
                <img
                  src="<?php echo esc_url( $image['sizes']['medium'] ); ?>"
                  alt="<?php echo esc_attr( $image['alt'] ); ?>"
                  loading="lazy"
                  class="img-res"
                >
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>
