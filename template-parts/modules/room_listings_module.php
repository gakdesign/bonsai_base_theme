<?php 
/**
 * #.# Room Listings Module
 *
 * Related CSS: assets/css/modules/room_listings_module.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<div class="jump-target" id="<?php echo get_sub_field('target_name'); ?>"></div>
<section class="base-module-padding room_listings_module room-listings <?php if(get_sub_field('show_top_flourish')) { ?>show-flourish<?php } ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php get_template_part('template-parts/snippets/content-block-intro');?>
      </div>
    </div>

    <div class="row gx-5">
      <?php
$rooms = get_sub_field('rooms_to_show'); // ACF Relationship (sub field)

if ( ! empty( $rooms ) && is_array( $rooms ) ) :
  foreach ( $rooms as $item ) :

    // Ensure we have a WP_Post object
    $post_obj = is_numeric( $item ) ? get_post( $item ) : $item;
    if ( ! $post_obj instanceof WP_Post ) {
      continue;
    }

    setup_postdata( $post_obj );

    // Fetch fields for this post explicitly via ID
    $image          = get_field( 'listing_image', $post_obj->ID );
    $listing_title  = get_field( 'listing_title', $post_obj->ID );
    $listing_sub    = get_field( 'listing_sub_title', $post_obj->ID );
    $listing_excerpt= get_field( 'listing_excerpt', $post_obj->ID );
    $pattern_image= get_field( 'pattern_background_image', $post_obj->ID );
    $permalink      = get_permalink( $post_obj->ID );
    ?>
    
    <div class="col-lg-6">
      <div class="room-listing-item">
        <div class="room-listing-header background-image" style="background-image:url('<?php echo esc_url($pattern_image['url']); ?>')">
          <div class="image-block">
            <?php if ( ! empty( $image ) && is_array( $image ) ) : ?>
              <img 
                src="<?php echo esc_url( $image['url'] ); ?>" 
                alt="<?php echo esc_attr( $image['alt'] ); ?>" 
                title="<?php echo esc_attr( $image['alt'] ); ?>"
              />
            <?php endif; ?>
          </div>
        </div>
        <div class="room-listing-content room-scheme-<?php echo esc_attr( strtolower( $post_obj->post_name ) ); ?>">
          <div class="content-block content-block-linked">
            <?php if ( $listing_title ) : ?>
              <h3><?php echo esc_html( $listing_title ); ?></h3>
            <?php endif; ?>

            <?php if ( $listing_sub ) : ?>
              <p class="sub-title"><?php echo esc_html( $listing_sub ); ?></p>
            <?php endif; ?>

            <?php if ( $listing_excerpt ) : ?>
              <div class="excerpt">
                <?php echo wp_kses_post( $listing_excerpt ); ?>
              </div>
            <?php endif; ?>

            <a href="<?php echo esc_url( $permalink ); ?>" class="btn cta-btn room-btn">More Information</a>
            <a href="<?php echo esc_url( $permalink ); ?>#booking-widget" class="availabilty-link">Check availability</a>
            
          </div>
        </div>
      </div>
    </div>

  <?php
  endforeach;
  wp_reset_postdata();
endif;
?>

    </div>
  </div>
</section>
