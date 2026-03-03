<?php
/**
 * Featured Product Categories Gateway Module
 *
 * Fields: section_heading, section_content,
 *         categories (repeater): category_image, category_title, category_link
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/featured_product_categories_gateway_module.css
 * Related JS:  assets/js/main.js
 **/

defined( 'ABSPATH' ) || exit;

$section_heading = get_sub_field('section_heading');
$section_content = get_sub_field('section_content');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="featured-product-categories-gateway-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
  <div class="container">

    <?php if ( $section_heading || $section_content ) : ?>
      <div class="row">
        <div class="col-lg-12">
          <?php if ( $section_heading ) : ?>
            <h2><?php echo esc_html( $section_heading ); ?></h2>
          <?php endif; ?>
          <?php if ( $section_content ) : ?>
            <div class="section-content"><?php echo wp_kses_post( $section_content ); ?></div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( have_rows('categories') ) : ?>
      <div class="row categories-gateway">
        <?php while ( have_rows('categories') ) : the_row();
          $cat_image = get_sub_field('category_image');
          $cat_title = get_sub_field('category_title');
          $cat_link  = get_sub_field('category_link');
        ?>
          <div class="col-lg-4 col-md-6">
            <a href="<?php echo esc_url( $cat_link ); ?>" class="category-card">
              <?php if ( $cat_image ) : ?>
                <div class="category-image">
                  <img
                    src="<?php echo esc_url( $cat_image['url'] ); ?>"
                    alt="<?php echo esc_attr( $cat_image['alt'] ); ?>"
                    loading="lazy"
                    class="img-res"
                  >
                </div>
              <?php endif; ?>
              <?php if ( $cat_title ) : ?>
                <h3 class="category-title"><?php echo esc_html( $cat_title ); ?></h3>
              <?php endif; ?>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
