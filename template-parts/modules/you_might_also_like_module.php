<?php
/**
 * You Might Also Like Module
 *
 * Fields: section_heading,
 *         items (repeater): item_image, item_title, item_excerpt, item_link
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/you_might_also_like_module.css
 * Related JS:  assets/js/main.js
 **/

defined( 'ABSPATH' ) || exit;

$section_heading = get_sub_field('section_heading');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="you-might-also-like-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
  <div class="container">

    <?php if ( $section_heading ) : ?>
      <div class="row">
        <div class="col-lg-12">
          <h2><?php echo esc_html( $section_heading ); ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( have_rows('items') ) : ?>
      <div class="row also-like-grid">
        <?php while ( have_rows('items') ) : the_row();
          $item_image   = get_sub_field('item_image');
          $item_title   = get_sub_field('item_title');
          $item_excerpt = get_sub_field('item_excerpt');
          $item_link    = get_sub_field('item_link');
        ?>
          <div class="col-lg-3 col-md-6">
            <article class="also-like-card">
              <?php if ( $item_image ) : ?>
                <div class="card-image">
                  <img
                    src="<?php echo esc_url( $item_image['url'] ); ?>"
                    alt="<?php echo esc_attr( $item_image['alt'] ); ?>"
                    loading="lazy"
                    class="img-res"
                  >
                </div>
              <?php endif; ?>
              <div class="card-body">
                <?php if ( $item_title ) : ?>
                  <h3><?php echo esc_html( $item_title ); ?></h3>
                <?php endif; ?>
                <?php if ( $item_excerpt ) : ?>
                  <p><?php echo esc_html( $item_excerpt ); ?></p>
                <?php endif; ?>
                <?php if ( $item_link ) : ?>
                  <a href="<?php echo esc_url( $item_link ); ?>" class="card-link">Find out more</a>
                <?php endif; ?>
              </div>
            </article>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
