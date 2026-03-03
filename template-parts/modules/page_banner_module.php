<?php
/**
 * Page Banner Module
 *
 * Fields: banner_image, banner_header, banner_subheading,
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/page_banner_module.css
 * Related JS:  assets/js/main.js
 **/

defined( 'ABSPATH' ) || exit;

$banner_image      = get_sub_field('banner_image');
$banner_header     = get_sub_field('banner_header');
$banner_subheading = get_sub_field('banner_subheading');
$no_top            = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom         = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="page-banner-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">

  <?php if ( $banner_image ) : ?>
    <div class="banner-image-wrap">
      <img src="<?php echo esc_url( $banner_image ); ?>" alt="" class="img-res">
    </div>
  <?php endif; ?>

  <div class="banner-content-wrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <?php if ( $banner_header ) : ?>
            <h1><?php echo esc_html( $banner_header ); ?></h1>
          <?php endif; ?>

          <?php if ( $banner_subheading ) : ?>
            <p class="banner-subheading"><?php echo esc_html( $banner_subheading ); ?></p>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

</section>
