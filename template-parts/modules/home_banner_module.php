<?php 
/**
 * #.# Home Banner Module
 *
 * Related CSS: assets/modules/home_banner_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding home_banner_module background-image"
  style="background-image:url('<?php echo esc_url(get_sub_field('banner_image')); ?>')">
  <?php if(get_sub_field('banner_video')) { ?>
    VIDEO CODE HERE
  <?php } ?>
  <div class="darken-me"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-xl-8 col-lg-8">
        <div class="center-this">
          <div>
            <div class="banner-logo text-center">
              <?php
                $image = get_sub_field('banner_logo');
                $size = 'full';
                echo wp_get_attachment_image($image, $size, false, [
                  'alt' => get_post_meta($image, '_wp_attachment_image_alt', true) ?: 'Logo'
                ]);
              ?>
            </div>
            <div class="banner-title text-center">
              <h1><?php echo esc_html(get_sub_field('banner_header')); ?></h1>
            </div>
            <div class="banner-ctas text-center">
              <?php 
              $ctas = ['banner_cta_one', 'banner_cta_two'];
              foreach ($ctas as $cta_field) :
                $link = get_sub_field($cta_field);
                if ($link):
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
                <a class="btn cta-btn bronze-cta"
                  href="<?php echo esc_url($link_url); ?>"
                  target="<?php echo esc_attr($link_target); ?>"
                  title="<?php echo esc_html($link_title); ?>"
                  role="button">
                  <?php echo esc_html($link_title); ?>
                </a>
              <?php endif; endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
  <div class="home-banner-footer-bg">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/home-banner-footer-bg.png" alt=" " class="img-res"/>
  </div>
</section>
<section class="position-sticky sticky-header banner-nav" role="banner">
  <div class="container container-header">
    <nav role="navigation" aria-label="Main menu">
      <?php wp_nav_menu( array(
        'container_class' => 'menu-main-menu-container',
        'menu_class'      => 'main-header-menu-sticky',
        'theme_location'  => 'primary'
      )); ?>
    </nav>
  </div>
</section>