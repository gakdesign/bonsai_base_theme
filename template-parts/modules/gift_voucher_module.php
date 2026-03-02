<?php 
/**
 * #.# Gift Vouchers Module
 *
 * Related CSS: assets/css/modules/gift_vouchers_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding gift_vouchers_module">
  <div class="container">
    <div class="row gx-5">
      <div class="col-lg-6">
        <div class="content-block contact-form-block">
          <div class="darken-form"></div>	
          <h2><?php echo get_sub_field('voucher_form_header'); ?></h2>
          <?php echo get_sub_field('voucher_form_code'); ?>
        </div>
      </div>
      <div class="col-lg-6 padding-over">
        <div class="content-block content-block-linked">
          <h2><?php echo get_sub_field('voucher_details_header'); ?></h2>   
          <?php echo get_sub_field('voucher_details_content'); ?> 
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="content-block content-block-linked"> 
                <?php echo get_sub_field('voucher_details_split_content'); ?> 
              </div>
            </div>
            <div class="col-lg-6  col-md-6">
              <div class="image-block">
                <?php 
                  $image = get_sub_field('voucher_image');
                  if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
