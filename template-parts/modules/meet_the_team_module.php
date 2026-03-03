<?php
/**
 * Meet the Team Module
 *
 * Queries the 'team' custom post type (registered via ACF).
 * Fields: section_heading, section_content,
 *         remove_top_padding, remove_bottom_padding
 *
 * Team post fields (ACF on team CPT): team_role, team_bio, team_image (featured image)
 *
 * Related CSS: assets/css/modules/meet_the_team_module.css
 * Related JS:  assets/js/main.js
 **/

defined( 'ABSPATH' ) || exit;

$section_heading = get_sub_field('section_heading');
$section_content = get_sub_field('section_content');
$no_top          = get_sub_field('remove_top_padding') ? ' no-top-padding' : '';
$no_bottom       = get_sub_field('remove_bottom_padding') ? ' no-bottom-padding' : '';

$team_query = new WP_Query([
  'post_type'      => 'team',
  'posts_per_page' => -1,
  'orderby'        => 'menu_order',
  'order'          => 'ASC',
  'no_found_rows'  => true,
]);
?>

<section class="meet-the-team-module<?php echo esc_attr( $no_top . $no_bottom ); ?>">
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

    <?php if ( $team_query->have_posts() ) : ?>
      <div class="row team-grid">
        <?php while ( $team_query->have_posts() ) : $team_query->the_post(); ?>
          <div class="col-lg-3 col-md-6">
            <article class="team-card">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="team-image">
                  <?php the_post_thumbnail( 'large', [ 'class' => 'img-res', 'loading' => 'lazy' ] ); ?>
                </div>
              <?php endif; ?>
              <div class="team-details">
                <h3><?php echo esc_html( get_the_title() ); ?></h3>
                <?php
                  $role = get_field('team_role');
                  if ( $role ) :
                ?>
                  <p class="team-role"><?php echo esc_html( $role ); ?></p>
                <?php endif; ?>
                <?php
                  $bio = get_field('team_bio');
                  if ( $bio ) :
                ?>
                  <div class="team-bio"><?php echo wp_kses_post( $bio ); ?></div>
                <?php endif; ?>
              </div>
            </article>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    <?php endif; ?>

  </div>
</section>
