<?php 
/**
 * #.# Content Grid Module
 *
 * Related CSS: assets/css/modules/content_image_grid.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding content_image_grid">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block">
          <?php if(get_sub_field('section_header')) { ?>
            <?php if(get_sub_field('set_header_to_h1')) { ?>
              <h1><?php echo get_sub_field('section_header'); ?></h1>
            <?php } else { ?>
              <h2><?php echo get_sub_field('section_header'); ?></h2>
            <?php } ?>
          <?php } ?>
          <?php if(get_sub_field('section_introduction')) { ?><?php echo get_sub_field('section_introduction'); ?><?php } ?>
        </div>
      </div>
    </div>
    <?php if(get_sub_field('grid_row')) { ?>
    <div class="row row-eq-height">
      <?php if(get_sub_field('show_image_on_the_left')) { ?>
      <div class="col-lg-6">
        <div class="image-content image-full">
          <?php 
            $image = get_sub_field('grid_image');
            if( !empty( $image ) ): 
          ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="content-grid <?php echo get_sub_field('content_background_colour'); ?>">
          <div class="content-block">
            <?php if(get_sub_field('grid_header')) { ?>
              <h2><?php echo get_sub_field('grid_header'); ?></h2>
            <?php } ?>
            <?php if(get_sub_field('grid_content')) { ?>
              <?php echo get_sub_field('grid_content'); ?>
            <?php } ?>
            <?php  $link = get_sub_field('grid_cta'); if( $link ): $link_url = $link['url']; $link_title = $link['title'];$link_target = $link['target'] ? $link['target'] : '_self'; ?>
              <a class="btn cta-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php } else { ?>
        <div class="col-lg-6 show-900-flex">
          <div class="image-content image-full">
            <?php 
              $image = get_sub_field('grid_image');
              if( !empty( $image ) ): 
            ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="content-grid <?php echo get_sub_field('content_background_colour'); ?>">
            <div class="content-block">
              <?php if(get_sub_field('grid_header')) { ?>
                <h2><?php echo get_sub_field('grid_header'); ?></h2>
              <?php } ?>
              <?php if(get_sub_field('grid_content')) { ?>
                <?php echo get_sub_field('grid_content'); ?>
              <?php } ?>
              <?php  $link = get_sub_field('grid_cta'); if( $link ): $link_url = $link['url']; $link_title = $link['title'];$link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="btn cta-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hide-900">
          <div class="image-content image-full">
            <?php 
              $image = get_sub_field('grid_image');
              if( !empty( $image ) ): 
            ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php } ?>
  </div>
</section>
