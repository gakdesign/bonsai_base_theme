<?php 
/**
 * #.# Contact Form Module
 *
 * Related CSS: assets/css/modules/contact_form_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding contact_form_module">
  <div class="container">
    <div class="row gx-5">
      <div class="col-lg-6">
        <div class="content-block contact-form-block">
          <div class="darken-form"></div>	
          <h2><?php echo get_sub_field('contact_form_header'); ?></h2>
          <?php echo get_sub_field('contact_form_shortcode'); ?>
        </div>
      </div>
      <div class="col-lg-6 padding-over">
        <div class="content-block content-block-linked">
          <h2><?php echo get_sub_field('find_us_header'); ?></h2>   
          <?php echo get_sub_field('find_us_content'); ?> 
          <h2 class="openinghours-h2"><?php echo get_sub_field('opening_hours_header'); ?></h2>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="content-block">
              <?php echo get_sub_field('opening_hours_details_column_one'); ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="content-block">
              <?php echo get_sub_field('opening_hours_details_column_two'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="googlemap">
          <?php echo get_sub_field('google_map'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
