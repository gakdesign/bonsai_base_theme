<?php 
/**
 * #.# Booking Embeds Module
 *
 * Related CSS: assets/css/modules/booking_embeds_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>

<?php if(get_sub_field('full_width')) { ?>
<div class="jump-target" id="booking-widget"></div>
<section class="base-module-padding booking_embeds_module" role="region" aria-labelledby="booking-widget-title">
  <div class="containercontainer-noside">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block">
          <h2 class="sr-only"><?php the_title();?>  for The Ley Arms</h2>
          <?php echo get_sub_field('booking_widget_code'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
  
<?php } else { ?>
<div class="jump-target" id="booking-widget"></div>
<section class="base-module-padding booking_embeds_module" role="region" aria-labelledby="booking-widget-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block">
          <h2 class="sr-only"><?php the_title();?>  for The Ley Arms</h2>
          <?php echo get_sub_field('booking_widget_code'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php } ?>


