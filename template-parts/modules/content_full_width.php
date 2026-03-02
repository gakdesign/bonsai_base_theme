<?php 
/**
 * #.# Content Full Width Module
 *
 * Related CSS: assets/css/modules/content_full_width_module.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<?php if( get_sub_field('content_type') == 'text-content' ) { ?>

<section class="base-module-padding content_full_width">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block small-width">
          <?php if(get_sub_field('section_header')) { ?>
            <?php if(get_sub_field('set_header_to_h1')) { ?>
              <h1><?php echo get_sub_field('section_header'); ?></h1>
            <?php } else { ?>
              <h2><?php echo get_sub_field('section_header'); ?></h2>
            <?php } ?>
          <?php } ?>
          <?php if(get_sub_field('section_content')) { ?><?php echo get_sub_field('section_content'); ?><?php } ?>
          <?php if(get_sub_field('section_cta')) { ?>
            <?php  $link = get_sub_field('section_cta'); if( $link ): $link_url = $link['url']; $link_title = $link['title'];$link_target = $link['target'] ? $link['target'] : '_self'; ?>
              <a class="btn cta-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
          <?php } ?>
          <?php if(get_sub_field('spotify_player')) { ?>
          <br/><br/><?php echo get_sub_field('spotify_player'); ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
    
<?php } elseif( get_sub_field('content_type') == 'video-content' ) { ?>

<section class="base-module-padding content_full_width">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block small-width">
          <?php if(get_sub_field('section_header')) { ?>
            <?php if(get_sub_field('set_header_to_h1')) { ?>
              <h1><?php echo get_sub_field('section_header'); ?></h1>
            <?php } else { ?>
              <h2><?php echo get_sub_field('section_header'); ?></h2>
            <?php } ?>
          <?php } ?>
          <?php if(get_sub_field('section_introduction')) { ?><?php echo get_sub_field('section_introduction'); ?><?php } ?>
        </div>
        <?php if(get_sub_field('self_hosted_video')) { ?>
          <video controls>
            <source src="<?php echo get_sub_field('self_hosted_video'); ?>" type="video/mp4" />
          </video>
        <?php } else { ?>
          <div class="videoWrapper"><?php echo get_sub_field('section_video'); ?></div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php } elseif( get_sub_field('content_type') == 'image-content' ) { ?>

<section class="base-module-padding content_full_width">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block small-width">
          <?php if(get_sub_field('section_header')) { ?>
            <?php if(get_sub_field('set_header_to_h1')) { ?>
              <h1><?php echo get_sub_field('section_header'); ?></h1>
            <?php } else { ?>
              <h2><?php echo get_sub_field('section_header'); ?></h2>
            <?php } ?>
          <?php } ?>
          <?php if(get_sub_field('section_introduction')) { ?><?php echo get_sub_field('section_introduction'); ?><?php } ?>
        </div>
        <div class="image-block">
          <?php
            $image = get_sub_field('section_image');
            $size = 'full';
            $attributes = array(
              'class' => 'img-res', // Add your desired class here
            );
            echo wp_get_attachment_image($image, $size, false, $attributes);
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php } ?>