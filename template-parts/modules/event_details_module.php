<?php 
/**
 * #.# Event Details Module
 *
 * Related CSS: assets/css/modules/event_details_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding event_details_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block">
          <h2><?php the_title();?></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="event-details-block">
          <div class="row">
            <div class="col-xl-2 col-lg-4 col-md-4">
              <div class="content-block text-center">
                <h3>Date:</h3>
                <?php echo get_sub_field('event_date'); ?>
              </div>
            </div>
            <div class="col-xl-2 col-lg-4  col-md-4">
              <div class="content-block text-center">
                <h3>Time:</h3>
                <?php echo get_sub_field('event_time'); ?>
              </div>
            </div>
            <div class="col-xl-2 col-lg-4  col-md-4">
              <div class="content-block text-center">
                <h3>Where:</h3>
                <?php echo get_sub_field('event_location'); ?>
              </div>
            </div>
            <div class="col-xl-6 col-lg-12 margin-for-1200">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="content-block text-center">
                    <h3>Booking Details:</h3>
                    <?php echo get_sub_field('booking_details'); ?>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="content-block text-center center-this">
                    <?php  $link = get_sub_field('booking_link'); if( $link ): $link_url = $link['url']; $link_title = $link['title'];$link_target = $link['target'] ? $link['target'] : '_self'; ?>
                      <a class="btn cta-btn bronze-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>" role="button"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row event-content-block">
      <div class="col-lg-9 col-md-9">
        <div class="content-block content-block-linked">
          <?php echo get_sub_field('event_content'); ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="image-block">
          <?php 
          $image = get_sub_field('event_poster_image');
          if( !empty( $image ) ): ?>
              <a href="<?php echo esc_url($image['url']); ?>" class="fancybox"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" /></a>
          <?php endif; ?>
          <?php if(get_sub_field('event_poster_pdf')) { ?>
            <div class="event-download">
              <a href="<?php echo get_sub_field('field_name'); ?>" title="<?php the_title();?>" target="_blank">Download poster</a> 
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
