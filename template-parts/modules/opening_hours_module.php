<?php 
/**
 * #.# Open Hours Module
 *
 * Related CSS: assets/css/modules/opening_hours_module.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
function bonsai_output_cta_btn($field) {
    $link = get_sub_field($field);
    if ($link) {
        $url    = $link['url'] ?? '';
        $title  = $link['title'] ?? '';
        $target = $link['target'] ?? '_self';
        if ($url && $title) {
            printf(
                '<a class="btn cta-btn bronze-cta" href="%s" target="%s" title="%s">%s</a>',
                esc_url($url),
                esc_attr($target),
                esc_attr($title),
                esc_html($title)
            );
        }
    }
}
?>

<section class="base-module-padding opening_hours_module">
  <div class="container">
    <div class="row">
      <!-- Opening Hours Column -->
      <div class="col-lg-6 text-center">
        <div class="opening-hours">
          <?php if ($header = get_sub_field('opening_hours_header')) : ?>
            <div class="content-block">
              <h2><?php echo esc_html($header); ?></h2>
            </div>
          <?php endif; ?>
          <div class="row">
            <?php if ($list1 = get_sub_field('opening_hours_list_one')) : ?>
              <div class="col-lg-6">
                <div class="content-block">
                  <div class="open-hours-listings">
                    <?php echo wp_kses_post($list1); ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php if ($list2 = get_sub_field('opening_hours_list_two')) : ?>
              <div class="col-lg-6">
                <div class="content-block">
                  <div class="open-hours-listings">
                    <?php echo wp_kses_post($list2); ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <?php
                bonsai_output_cta_btn('cta_one');
                bonsai_output_cta_btn('cta_two');
                if ($call_us = get_sub_field('call_us_content')) :
              ?>
                <div class="content-block">
                  <div class="additional-content">
                    <?php echo wp_kses_post($call_us); ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Map / Find Us Column -->
      <div class="col-lg-6">
        <div class="content-block text-center">
          <?php if ($find_us_header = get_sub_field('find_us_header')) : ?>
            <h2><?php echo esc_html($find_us_header); ?></h2>
          <?php endif; ?>
        </div>
        <div class="content-block content-block-linked"> 
          <?php echo get_sub_field('find_us_content'); ?>
          <?php if ($map_code = get_sub_field('google_map_code')) : ?>
            <div class="googlemap">
              <?php echo $map_code; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
