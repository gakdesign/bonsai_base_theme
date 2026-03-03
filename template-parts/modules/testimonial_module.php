<?php
/**
 * Testimonial Module
 *
 * Fields: section_heading,
 *         testimonials (repeater): testimonial_quote, testimonial_name,
 *                                  testimonial_role, testimonial_image
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/testimonial_module.css
 * Related JS:  assets/js/main.js
 **/

$section_heading = get_sub_field('section_heading');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="testimonial-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
  <div class="container">

    <?php if ( $section_heading ) : ?>
      <div class="row">
        <div class="col-lg-12">
          <h2><?php echo esc_html( $section_heading ); ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( have_rows('testimonials') ) : ?>
      <div class="row testimonials-grid">
        <?php while ( have_rows('testimonials') ) : the_row();
          $quote  = get_sub_field('testimonial_quote');
          $name   = get_sub_field('testimonial_name');
          $role   = get_sub_field('testimonial_role');
          $image  = get_sub_field('testimonial_image');
        ?>
          <div class="col-lg-4 col-md-6">
            <blockquote class="testimonial-card">
              <?php if ( $quote ) : ?>
                <p class="testimonial-quote"><?php echo esc_html( $quote ); ?></p>
              <?php endif; ?>
              <footer class="testimonial-attribution">
                <?php if ( $image ) : ?>
                  <div class="testimonial-image">
                    <img
                      src="<?php echo esc_url( $image['url'] ); ?>"
                      alt="<?php echo esc_attr( $image['alt'] ); ?>"
                      loading="lazy"
                    >
                  </div>
                <?php endif; ?>
                <div class="testimonial-meta">
                  <?php if ( $name ) : ?>
                    <cite class="testimonial-name"><?php echo esc_html( $name ); ?></cite>
                  <?php endif; ?>
                  <?php if ( $role ) : ?>
                    <span class="testimonial-role"><?php echo esc_html( $role ); ?></span>
                  <?php endif; ?>
                </div>
              </footer>
            </blockquote>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
