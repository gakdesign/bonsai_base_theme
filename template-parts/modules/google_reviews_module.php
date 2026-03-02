<?php 
/**
 * #.# Google Reviews Module
 *
 * Related CSS: assets/css/modules/google_reviews_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="testimonial-header-bg">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/testimonial-module-bg.png" alt=" " class="img-res"/>
</section>
<section class="base-module-padding google_reviews_module" aria-label="Google Reviews">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <?php get_template_part('template-parts/snippets/content-block-intro');?>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-2 col-lg-1"></div>
      <div class="col-xl-8 col-lg-10">
        <!-- Elfsight Google Reviews | The Ley Arms -->
        <script src="https://elfsightcdn.com/platform.js" async></script>
        <div class="elfsight-app-2df92705-c884-4618-8f20-a4d9c7458396" data-elfsight-app-lazy></div>
      </div>
      <div class="col-xl-2 col-lg-1">
        <div class="image-block hide-900">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/testimonial-bird.png" alt=" "/>
        </div>
      </div>
    </div>
  </div>
</section>
