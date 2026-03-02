<?php 
/**
 * #.# Testimonial Module
 *
 * Related CSS: assets/css/modules/testimonial_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="testimonial-header-bg">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/testimonial-module-bg.png" alt=" " class="img-res"/>
</section>
<section class="base-module-padding testimonial_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php get_template_part('template-parts/snippets/content-block-intro');?>
      </div>
    </div>
  </div>
</section>
