<?php 
/**
 * #.# Gallery Slider Module
 *
 * Related CSS: assets/css/modules/gallery_slider_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<?php if ( get_sub_field('section_header') || get_sub_field('section_content') ) : ?>
<section class="base-module-padding gallery_slider_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php get_template_part('template-parts/snippets/content-block-intro');?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<section class="base-module-padding gallery_slider_module_images">
  <div class="container">
    <?php
    // Collect slides once so we don't loop twice
    $slides = [];
    if ( have_rows( 'gallery_images' ) ) :
      while ( have_rows( 'gallery_images' ) ) : the_row();
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

    <?php if ( ! empty( $slides ) ) : ?>
      <div class="row gx-5 align-items-start">
        <!-- Main slider -->
        <div class="col-lg-9 order-1">
          <div class="galleryslider-for">
            <?php foreach ( $slides as $slide ) :
              $img      = $slide['image'];
              $alt      = isset( $img['alt'] ) && $img['alt'] !== '' ? $img['alt'] : ( isset( $img['title'] ) ? $img['title'] : '' );
              $caption  = isset( $slide['caption'] ) ? $slide['caption'] : '';
            ?>
              <div class="main-image">
                <?php
                // Use wp_get_attachment_image for srcset/sizes & proper escaping
                echo wp_get_attachment_image(
                  $img['ID'],
                  'full',
                  false,
                  [
                    'class'     => 'gallery-main-img',
                    'alt'       => esc_attr( $alt ),
                    // avoid stuffing title attr unless you really want it in tooltips
                    'decoding'  => 'async',
                    'loading'   => 'lazy',
                  ]
                );
                ?>

                <?php if ( ! empty( $caption ) ) : ?>
                  <div class="main-image-caption">
                    <?php echo wp_kses_post( $caption ); ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Thumbnails (vertical on desktop, below on mobile) -->
        <div class="col-lg-3 order-2">
          <div class="galleryslider-nav" aria-label="Gallery thumbnails">
            <?php foreach ( $slides as $slide ) :
              $img = $slide['image'];
              $alt = isset( $img['alt'] ) && $img['alt'] !== '' ? $img['alt'] : ( isset( $img['title'] ) ? $img['title'] : '' );
            ?>
              <div class="thumb">
                <?php
                echo wp_get_attachment_image(
                  $img['ID'],
                  'large',
                  false,
                  [
                    'class'     => 'gallery-thumb-img',
                    'alt'       => esc_attr( $alt ),
                    'decoding'  => 'async',
                    'loading'   => 'lazy',
                    // Handy if your JS wants to show caption on hover/tooltip
                    'data-caption' => isset( $slide['caption'] ) ? esc_attr( wp_strip_all_tags( $slide['caption'] ) ) : '',
                  ]
                );
                ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
