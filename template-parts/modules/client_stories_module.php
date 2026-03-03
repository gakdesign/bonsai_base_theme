<?php
/**
 * Client Stories Module
 *
 * Fields: section_heading, section_content,
 *         stories (repeater): story_image, story_title, story_excerpt, story_link, story_client_name
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/client_stories_module.css
 * Related JS:  assets/js/main.js
 **/

defined( 'ABSPATH' ) || exit;

$section_heading = get_sub_field('section_heading');
$section_content = get_sub_field('section_content');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';
?>

<section class="client-stories-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
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

    <?php if ( have_rows('stories') ) : ?>
      <div class="row stories-grid">
        <?php while ( have_rows('stories') ) : the_row();
          $story_image       = get_sub_field('story_image');
          $story_title       = get_sub_field('story_title');
          $story_excerpt     = get_sub_field('story_excerpt');
          $story_link        = get_sub_field('story_link');
          $story_client_name = get_sub_field('story_client_name');
        ?>
          <div class="col-lg-4 col-md-6">
            <article class="story-card">
              <?php if ( $story_image ) : ?>
                <div class="story-image">
                  <img
                    src="<?php echo esc_url( $story_image['url'] ); ?>"
                    alt="<?php echo esc_attr( $story_image['alt'] ); ?>"
                    loading="lazy"
                    class="img-res"
                  >
                </div>
              <?php endif; ?>
              <div class="story-body">
                <?php if ( $story_client_name ) : ?>
                  <span class="story-client"><?php echo esc_html( $story_client_name ); ?></span>
                <?php endif; ?>
                <?php if ( $story_title ) : ?>
                  <h3><?php echo esc_html( $story_title ); ?></h3>
                <?php endif; ?>
                <?php if ( $story_excerpt ) : ?>
                  <p><?php echo esc_html( $story_excerpt ); ?></p>
                <?php endif; ?>
                <?php if ( $story_link ) : ?>
                  <a href="<?php echo esc_url( $story_link ); ?>" class="story-link">Read more</a>
                <?php endif; ?>
              </div>
            </article>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
