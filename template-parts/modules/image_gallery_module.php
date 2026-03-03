<?php
/**
 * Image Gallery Module
 *
 * Fields: section_heading, gallery_images (gallery),
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/image_gallery_module.css
 * Related JS:  assets/js/main.js
 **/

defined( 'ABSPATH' ) || exit;

$section_heading = get_sub_field('section_heading');
$gallery_images  = get_sub_field('gallery_images');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="image-gallery-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
  <div class="container">

    <?php if ( $section_heading ) : ?>
      <div class="row">
        <div class="col-lg-12">
          <h2><?php echo esc_html( $section_heading ); ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( $gallery_images ) : ?>
      <div class="row gallery-grid">
        <?php foreach ( $gallery_images as $image ) : ?>
          <div class="col-lg-4 col-md-6">
            <figure class="gallery-item">
              <img
                src="<?php echo esc_url( $image['sizes']['large'] ); ?>"
                alt="<?php echo esc_attr( $image['alt'] ); ?>"
                loading="lazy"
                class="img-res"
              >
            </figure>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
