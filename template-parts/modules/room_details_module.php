<?php 
/**
 * #.# Room Details Module
 *
 * Related CSS: assets/css/modules/room_details_module.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<?php
  // Determine target post ID safely
  $target_post_id = isset( $post_obj->ID ) ? (int) $post_obj->ID : get_the_ID();

  // Header: prefer escaping; intro allows limited HTML
?>
<section class="base-module-padding room-details-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block">
          <?php if ( get_sub_field( 'set_header_to_h1' ) ) : ?>
            <h1><?php echo esc_html( get_sub_field( 'section_header' ) ); ?></h1>
          <?php else : ?>
            <h2><?php echo esc_html( get_sub_field( 'section_header' ) ); ?></h2>
          <?php endif; ?>

          <?php
            $section_intro = get_sub_field( 'section_introduction' );
            if ( $section_intro ) {
              echo wp_kses_post( $section_intro );
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  // Fetch fields for this post explicitly via ID
  $image            = get_field( 'listing_image', $target_post_id );
  $listing_title    = get_field( 'listing_title', $target_post_id );
  $listing_sub      = get_field( 'listing_sub_title', $target_post_id );
  $listing_excerpt  = get_field( 'listing_excerpt', $target_post_id );
  $availability_id  = get_field( 'availability_link_tag', $target_post_id );
  $pattern_image    = get_field( 'pattern_background_image', $target_post_id ); // array or URL
  $pattern_url      = '';
  if ( is_array( $pattern_image ) && ! empty( $pattern_image['url'] ) ) {
    $pattern_url = $pattern_image['url'];
  } elseif ( is_string( $pattern_image ) ) {
    $pattern_url = $pattern_image;
  }
  $permalink        = get_permalink( $target_post_id );

  // Collect slides once so we don't loop twice (scope to target post)
  $slides = [];
  if ( have_rows( 'gallery_images', $target_post_id ) ) :
    while ( have_rows( 'gallery_images', $target_post_id ) ) : the_row();
      $img     = get_sub_field( 'gallery_image' );   // ACF image array
      $caption = get_sub_field( 'image_caption' );   // string (may be empty)

      if ( ! empty( $img ) && ! empty( $img['ID'] ) ) {
        $slides[] = [
          'image'   => $img,
          'caption' => $caption,
        ];
      }
    endwhile;
  endif;
?>

<section class="base-module-padding room-details-slider gallery_slider_module room-scheme-<?php echo esc_attr( sanitize_title( get_post_field( 'post_name', $target_post_id ) ) ); ?>">
  <div class="container">
    <?php if ( ! empty( $slides ) ) : ?>
      <div class="row gx-4 align-items-start">
        <!-- Main slider -->
        <div class="col-lg-9 order-1">
          <div class="room-details-top-header background-image"<?php echo $pattern_url ? ' style="background-image:url(\'' . esc_url( $pattern_url ) . '\')"' : ''; ?>>
            <div class="galleryslider-for" aria-label="Room gallery">
              <?php foreach ( $slides as $slide ) :
                $img     = $slide['image'];
                $alt     = isset( $img['alt'] ) && $img['alt'] !== '' ? $img['alt'] : ( isset( $img['title'] ) ? $img['title'] : '' );
                $caption = isset( $slide['caption'] ) ? $slide['caption'] : '';
              ?>
                <figure class="main-image">
                  <?php
                    // Use wp_get_attachment_image for srcset/sizes & proper escaping
                    echo wp_get_attachment_image(
                      $img['ID'],
                      'full',
                      false,
                      [
                        'class'     => 'gallery-main-img',
                        'alt'       => esc_attr( $alt ),
                        'decoding'  => 'async',
                        'loading'   => 'lazy',
                      ]
                    );
                  ?>
                  <?php if ( ! empty( $caption ) ) : ?>
                    <figcaption class="main-image-caption">
                      <?php echo wp_kses_post( $caption ); ?>
                    </figcaption>
                  <?php endif; ?>
                </figure>
              <?php endforeach; ?>
            </div>
            <div class="galleryslider-nav show-900" aria-label="Gallery thumbnails">
            <?php foreach ( $slides as $slide ) :
              $img = $slide['image'];
              $alt = isset( $img['alt'] ) && $img['alt'] !== '' ? $img['alt'] : ( isset( $img['title'] ) ? $img['title'] : '' );
              $data_caption = isset( $slide['caption'] ) ? wp_strip_all_tags( $slide['caption'] ) : '';
            ?>
              <button class="thumb" type="button">
                <?php
                  echo wp_get_attachment_image(
                    $img['ID'],
                    'large',
                    false,
                    [
                      'class'        => 'gallery-thumb-img',
                      'alt'          => esc_attr( $alt ),
                      'decoding'     => 'async',
                      'loading'      => 'lazy',
                      'data-caption' => esc_attr( $data_caption ),
                    ]
                  );
                ?>
              </button>
            <?php endforeach; ?>
          </div>

            <?php
              // Room highlighted features (scoped to target post)
              if ( have_rows( 'room_highlighted_features', $target_post_id ) ) :
            ?>
              <div class="room-icons" role="list" aria-label="Highlighted features">
                <?php while ( have_rows( 'room_highlighted_features', $target_post_id ) ) : the_row(); ?>
                  <?php
                    $icon_type = get_sub_field( 'icon_type' );
                    $feature_details = get_sub_field( 'feature_details' );
                  ?>
                  <div class="room-icon-details <?php echo esc_attr( $icon_type ); ?>" role="listitem">
                    <?php if ( $feature_details ) : ?>
                      <?php echo esc_html( $feature_details ); ?>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="room-details-content content-block">
            <?php
              $room_details = get_sub_field( 'room_details' );
              if ( $room_details ) {
                echo wp_kses_post( $room_details );
              }
            ?>
            <?php if(get_sub_field('booking_link')) { ?>
              <a href="<?php echo get_sub_field('booking_link'); ?>" class="btn cta-btn bronze-cta">
                <?php esc_html_e( 'View availability', 'your-textdomain' ); ?>
              </a>
            <?php } ?>

            
          </div>
        </div>

        <!-- Thumbnails (vertical on desktop, below on mobile) -->
        <div class="col-lg-3 order-2">
          <div class="galleryslider-nav hide-900" aria-label="Gallery thumbnails">
            <?php foreach ( $slides as $slide ) :
              $img = $slide['image'];
              $alt = isset( $img['alt'] ) && $img['alt'] !== '' ? $img['alt'] : ( isset( $img['title'] ) ? $img['title'] : '' );
              $data_caption = isset( $slide['caption'] ) ? wp_strip_all_tags( $slide['caption'] ) : '';
            ?>
              <button class="thumb" type="button">
                <?php
                  echo wp_get_attachment_image(
                    $img['ID'],
                    'large',
                    false,
                    [
                      'class'        => 'gallery-thumb-img',
                      'alt'          => esc_attr( $alt ),
                      'decoding'     => 'async',
                      'loading'      => 'lazy',
                      'data-caption' => esc_attr( $data_caption ),
                    ]
                  );
                ?>
              </button>
            <?php endforeach; ?>
          </div>

          <div class="side-booking text-center content-block background-image hide-900"<?php echo $pattern_url ? ' style="background-image:url(\'' . esc_url( $pattern_url ) . '\')"' : ''; ?>>
            <p>
              <?php
                /* Translators: %s = suite title */
                printf(
                  esc_html__( 'View availability and book the %s suite', 'your-textdomain' ),
                  esc_html( get_the_title( $target_post_id ) )
                );
              ?>
            </p>

            <?php if(get_sub_field('booking_link')) { ?>
              <a href="<?php echo get_sub_field('booking_link'); ?>" class="btn cta-btn bronze-cta">
                <?php esc_html_e( 'View availability', 'your-textdomain' ); ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
