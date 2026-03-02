<?php 
/**
 * #.# Gateway Hover Module
 *
 * Related CSS: assets/css/modules/gateway_hover_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding gateway_hover_module">
  <div class="container-noside">
    <div class="row row-eq-height gx-0">

      <?php if( have_rows('hover_item') ){ ?>
      <?php $i = 0; ?>
      <?php while( have_rows('hover_item') ): the_row(); ?>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="hover-block-item background-image" style="background-image:url('<?php echo get_sub_field('background_image'); ?>')" >
            <a href="<?php echo get_sub_field('item_url'); ?>" title="<?php echo get_sub_field('item_header'); ?>">
            <div class="center-this">
              <div>
                <div class="content-block text-center">
                  <h3><?php echo get_sub_field('item_header'); ?></h3>
                  <?php echo get_sub_field('item_content'); ?>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>

      <?php $i++;?>
      <?php endwhile; ?>
      <?php } ?>

    </div>
  </div>
</section>
