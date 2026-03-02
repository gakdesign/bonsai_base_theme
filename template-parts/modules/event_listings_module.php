<?php 
/**
 * #.# Event Listings Module
 *
 * Related CSS: assets/css/modules/event_listings_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding event_listings_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <?php get_template_part('template-parts/snippets/content-block-intro');?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 text-center left-900">
        <div class="search-filter-block">
          <?php echo do_shortcode('[searchandfilter id="547"]'); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <?php echo do_shortcode('[searchandfilter id="547" show="results"]'); ?>
      </div>
    </div>
  </div>
</section>
