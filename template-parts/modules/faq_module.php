<?php
/**
 * FAQ Module
 *
 * Fields: section_heading, section_content,
 *         faqs (repeater): faq_question, faq_answer
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/faq_module.css
 * Related JS:  assets/js/main.js — .accordion-header / .accordion-content
 **/

defined( 'ABSPATH' ) || exit;

$section_heading = get_sub_field('section_heading');
$section_content = get_sub_field('section_content');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="faq-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
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

    <?php if ( have_rows('faqs') ) : ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="faq-accordion">
            <?php while ( have_rows('faqs') ) : the_row();
              $question = get_sub_field('faq_question');
              $answer   = get_sub_field('faq_answer');
            ?>
              <div class="faq-item">
                <?php if ( $question ) : ?>
                  <button class="accordion-header" aria-expanded="false">
                    <?php echo esc_html( $question ); ?>
                  </button>
                <?php endif; ?>
                <?php if ( $answer ) : ?>
                  <div class="accordion-content">
                    <?php echo wp_kses_post( $answer ); ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>
