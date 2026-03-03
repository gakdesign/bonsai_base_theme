<?php
/**
 * Home Banner Module
 *
 * Fields: banner_image, banner_video, banner_logo, banner_header, banner_content,
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/home_banner_module.css
 * Related JS:  assets/js/main.js
 **/

$banner_image   = get_sub_field('banner_image');
$banner_video   = get_sub_field('banner_video');
$banner_logo    = get_sub_field('banner_logo');
$banner_header  = get_sub_field('banner_header');
$banner_content = get_sub_field('banner_content');
$no_top         = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom      = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="home-banner-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">

  <?php if ( $banner_video ) : ?>
    <div class="banner-video-wrap">
      <video autoplay muted loop playsinline poster="<?php echo esc_url( $banner_image ); ?>">
        <source src="<?php echo esc_url( $banner_video ); ?>" type="video/mp4">
      </video>
    </div>
  <?php elseif ( $banner_image ) : ?>
    <div class="banner-image-wrap">
      <img src="<?php echo esc_url( $banner_image ); ?>" alt="" class="img-res">
    </div>
  <?php endif; ?>

  <div class="banner-content-wrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <?php if ( $banner_logo ) : ?>
            <div class="banner-logo">
              <?php echo wp_get_attachment_image( $banner_logo['ID'], 'full' ); ?>
            </div>
          <?php endif; ?>

          <?php if ( $banner_header ) : ?>
            <h1><?php echo esc_html( $banner_header ); ?></h1>
          <?php endif; ?>

          <?php if ( $banner_content ) : ?>
            <div class="banner-content">
              <?php echo wp_kses_post( $banner_content ); ?>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

</section>
