<?php
/**
 * Case Study Listings Module
 *
 * Queries the 'case-study' custom post type (registered via ACF).
 * Fields: section_heading, section_content, posts_per_page,
 *         remove_top_padding, remove_bottom_padding
 *
 * Related CSS: assets/css/modules/case_study_listings_module.css
 * Related JS:  assets/js/main.js
 **/

$section_heading = get_sub_field('section_heading');
$section_content = get_sub_field('section_content');
$posts_per_page  = get_sub_field('posts_per_page') ?: 9;
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';

$case_studies = new WP_Query([
  'post_type'      => 'case-study',
  'posts_per_page' => $posts_per_page,
  'orderby'        => 'date',
  'order'          => 'DESC',
]);
?>

<section class="case-study-listings-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
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

    <?php if ( $case_studies->have_posts() ) : ?>
      <div class="row case-studies-grid">
        <?php while ( $case_studies->have_posts() ) : $case_studies->the_post(); ?>
          <div class="col-lg-4 col-md-6">
            <article class="case-study-card">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="case-study-image">
                  <?php the_post_thumbnail( 'large', [ 'class' => 'img-res', 'loading' => 'lazy' ] ); ?>
                </a>
              <?php endif; ?>
              <div class="case-study-body">
                <h3>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p><?php echo esc_html( bonsai_get_trimmed_excerpt( 25 ) ); ?></p>
                <a href="<?php the_permalink(); ?>" class="case-study-link">Read case study</a>
              </div>
            </article>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    <?php endif; ?>

  </div>
</section>
