<?php 
/**
 * #.# Gateway Blocks Module
 *
 * Related CSS: assets/css/modules/gateway_blocks_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding gateway_blocks_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <?php get_template_part('template-parts/snippets/content-block-intro');?>
      </div>
    </div>
  </div>
  <div class="row gx-0 row-eq-height supplier-grid">
  <?php if( have_rows('grid_item') ){ ?>
  <?php while( have_rows('grid_item') ): the_row(); ?>
    <div class="col-lg-3 col-md-6">
      <div class="supplier-item">
        <?php 
          $link   = get_sub_field('grid_link'); 
          $image  = get_sub_field('grid_image'); 
          $header = get_sub_field('grid_header'); 
        ?>

        <?php if ( $link ) : 
          $link_url    = $link['url'];
          $link_title  = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
          <a 
            href="<?php echo esc_url( $link_url ); ?>" 
            target="<?php echo esc_attr( $link_target ); ?>" 
            title="<?php echo esc_attr( $link_title ); ?>"
            class="supplier-link"
          >
        <?php endif; ?>

            <?php if ( ! empty( $image ) ) : ?>
              <img 
                src="<?php echo esc_url( $image['url'] ); ?>" 
                alt="<?php echo esc_attr( $image['alt'] ); ?>" 
                title="<?php echo esc_attr( $image['title'] ); ?>"
              />
            <?php endif; ?>

            <?php if ( $header ) : ?>
              <div class="supplier-details text-center">
                <?php echo esc_html( $header ); ?>
              </div>
            <?php endif; ?>

        <?php if ( $link ) : ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  <?php endwhile; ?>
  <?php } ?>
  </div>
</section>
