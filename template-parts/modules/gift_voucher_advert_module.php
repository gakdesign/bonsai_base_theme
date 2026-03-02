<?php 
/**
 * #.# Gift Vouchers Module
 *
 * Related CSS: assets/css/modules/gift_voucher_advert_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding gift_voucher_advert_module">
  <div class="container">
    <div class="row">
      <div class="gift-voucher-bg">
        <div class="row"> 
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="content-block text-center">
              <h2><?php echo get_sub_field('section_header'); ?></h2>
              <?php echo get_sub_field('section_introduction'); ?>
              <?php  $link = get_sub_field('section_cta'); if( $link ): $link_url = $link['url']; $link_title = $link['title'];$link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="btn cta-btn black-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>" role="button"><?php echo esc_html( $link_title ); ?></a>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="image-block hide-900">
              <?php 
                $image = get_sub_field('section_image');
                if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
