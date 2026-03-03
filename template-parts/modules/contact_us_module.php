<?php
/**
 * Contact Us Module
 *
 * Fields: section_heading, section_content, contact_form_shortcode,
 *         show_details (true_false)
 *         remove_top_padding, remove_bottom_padding
 *
 * Contact details drawn from Site Settings options page:
 *   contact_email, contact_telephone, contact_address
 *
 * Related CSS: assets/css/modules/contact_us_module.css
 * Related JS:  assets/js/main.js
 **/

defined( 'ABSPATH' ) || exit;

$section_heading      = get_sub_field('section_heading');
$section_content      = get_sub_field('section_content');
$form_shortcode       = get_sub_field('contact_form_shortcode');
$show_details         = get_sub_field('show_details');
$no_top               = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom            = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';

$contact_email     = get_field('contact_email', 'option');
$contact_telephone = get_field('contact_telephone', 'option');
$contact_address   = get_field('contact_address', 'option');
?>

<section class="contact-us-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
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

    <div class="row">

      <?php if ( $show_details ) : ?>
        <div class="col-lg-4">
          <div class="contact-details">
            <?php if ( $contact_address ) : ?>
              <address><?php echo wp_kses_post( $contact_address ); ?></address>
            <?php endif; ?>
            <?php if ( $contact_telephone ) : ?>
              <p>
                <a href="tel:<?php echo esc_attr( $contact_telephone ); ?>">
                  <?php echo esc_html( $contact_telephone ); ?>
                </a>
              </p>
            <?php endif; ?>
            <?php if ( $contact_email ) : ?>
              <p>
                <a href="<?php echo esc_url( 'mailto:' . $contact_email ); ?>">
                  <?php echo esc_html( $contact_email ); ?>
                </a>
              </p>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-8">
      <?php else : ?>
        <div class="col-lg-12">
      <?php endif; ?>

          <?php if ( $form_shortcode ) : ?>
            <div class="contact-form">
              <?php echo do_shortcode( wp_kses( $form_shortcode, [] ) ); ?>
            </div>
          <?php endif; ?>

        </div>

    </div>
  </div>
</section>
