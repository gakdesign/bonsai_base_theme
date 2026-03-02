<?php 
/**
 * #.# Content Grid Module
 *
 * Related CSS: assets/css/modules/content_image_grid_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding content_image_grid_module">
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




<?php if ( have_rows('grid_row') ) : ?>
  <div class="row gx-3 row-equal-height">
    <?php while ( have_rows('grid_row') ) : the_row(); ?>

      <?php if ( get_sub_field('show_image_on_the_left') ) : ?>
        <div class="col-lg-6">
          <div class="image-block image-full">
            <?php if ( $image = get_sub_field('grid_image') ) : ?>
              <img src="<?php echo esc_url($image['url']); ?>"
                   alt="<?php echo esc_attr($image['alt']); ?>"
                   title="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="content-grid">
            <div class="content-block">
              <?php if ( $h = get_sub_field('grid_header') ) : ?>
                <h2><?php echo esc_html( $h ); ?></h2>
              <?php endif; ?>

              <?php if ( $content = get_sub_field('grid_content') ) : ?>
                <?php echo wp_kses_post( $content ); ?>
              <?php endif; ?>

              <?php if ( $link = get_sub_field('grid_cta') ) :
                $link_url   = $link['url'];
                $link_title = $link['title'];
                $link_target= $link['target'] ? $link['target'] : '_self'; ?>
                <a class="btn cta-btn"
                   href="<?php echo esc_url( $link_url ); ?>"
                   target="<?php echo esc_attr( $link_target ); ?>"
                   title="<?php echo esc_attr( $link_title ); ?>">
                   <?php echo esc_html( $link_title ); ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>

      <?php else : ?>
        <div class="col-lg-6 show-900-flex">
          <div class="image-block image-full">
            <?php if ( $image = get_sub_field('grid_image') ) : ?>
              <img src="<?php echo esc_url($image['url']); ?>"
                   alt="<?php echo esc_attr($image['alt']); ?>"
                   title="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="content-grid">
            <div class="content-block">
              <?php if ( $h = get_sub_field('grid_header') ) : ?>
                <h2><?php echo esc_html( $h ); ?></h2>
              <?php endif; ?>

              <?php if ( $content = get_sub_field('grid_content') ) : ?>
                <?php echo wp_kses_post( $content ); ?>
              <?php endif; ?>

              <?php if ( $link = get_sub_field('grid_cta') ) :
                $link_url   = $link['url'];
                $link_title = $link['title'];
                $link_target= $link['target'] ? $link['target'] : '_self'; ?>
                <a class="btn cta-btn"
                   href="<?php echo esc_url( $link_url ); ?>"
                   target="<?php echo esc_attr( $link_target ); ?>"
                   title="<?php echo esc_attr( $link_title ); ?>">
                   <?php echo esc_html( $link_title ); ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hide-900">
          <div class="image-block image-full">
            <?php if ( $image = get_sub_field('grid_image') ) : ?>
              <img src="<?php echo esc_url($image['url']); ?>"
                   alt="<?php echo esc_attr($image['alt']); ?>"
                   title="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>

    <?php endwhile; ?>
  </div>
<?php endif; ?>

  </div>
</section>
