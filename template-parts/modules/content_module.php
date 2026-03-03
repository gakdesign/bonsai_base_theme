<?php
/**
 * #.# Content Module
 *
 * Related CSS: assets/modules/content_module.css
 * Related CSS (Theme CSS): assets/css/core/additions.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/

defined( 'ABSPATH' ) || exit;
?>


<?php if( have_rows('content_builder') ){ ?>
<?php while( have_rows('content_builder') ): the_row(); ?>

  <?php if( get_sub_field('content_type') == 'content-text' ) { ?>
    <section class="insights_content_module content-type-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="content-block">
              <?php echo wp_kses_post( get_sub_field('text_content_block') ); ?>
            </div>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </section>
  <?php } elseif( get_sub_field('content_type') == 'content-quote' ) { ?> 
    <section class="insights_content_module content-type-quote">
      <div class="container">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="content-quote-block text-center">
              <div class="quote-icon">“</div>
              <div class="quote-content"><?php echo wp_kses_post( get_sub_field('main_quote') ); ?></div>
              <div class="quote-cite"><?php echo esc_html( get_sub_field('quote_citation') ); ?></div>
            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>
      </div>
    </section>
  <?php } elseif( get_sub_field('content_type') == 'content-video' ) { ?> 
    <section class="insights_content_module content-type-video">
      <div class="container">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="video-block">
              <video muted="" autoplay="" loop="" playsinline="" id="video_player" preload="auto">
                <source type="video/mp4" src="<?php echo esc_url( get_sub_field('video_file') ); ?>">
              </video>
            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>
      </div>
    </section>
  <?php } elseif( get_sub_field('content_type') == 'content-image' ) { ?> 
    <section class="insights_content_module content-type-image">
      <div class="container">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="image-block">
              <?php 
              $image = get_sub_field('content_image');
              if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>
      </div>
    </section>
  <?php } elseif( get_sub_field('content_type') == 'content-table' ) { ?> 
    <section class="insights_content_module content-type-table">
      <div class="container">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="table-block">
              <?php echo wp_kses_post( get_sub_field('content_table') ); ?>
            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>
      </div>
    </section>
  <?php } elseif( get_sub_field('content_type') == 'content-two-images' ) { ?> 
    <section class="insights_content_module content-type-image">
      <div class="container">
        <div class="row row-eq-height gx-2">
          <div class="col-lg-2"></div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-6">
            <div class="image-block">
              <?php 
              $image = get_sub_field('image_one');
              if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-6">
            <div class="image-block">
              <?php 
              $image = get_sub_field('image_two');
              if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>
      </div>
    </section>
  <?php } elseif( get_sub_field('content_type') == 'content-two-column-text' ) { ?> 
    <section class="insights_content_module content-type-text">
      <div class="container">
        <div class="row row-eq-height gx-5">
          <div class="col-lg-2"></div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="content-block">
              <?php echo wp_kses_post( get_sub_field('text_column_one') ); ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="content-block">
              <?php echo wp_kses_post( get_sub_field('text_column_two') ); ?>
            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>
      </div>
    </section>
  <?php } elseif( get_sub_field('content_type') == 'content-image-text' ) { ?> 
    <section class="insights_content_module content-type-text">
      <div class="container">
        <div class="row row-eq-height gx-5">
          <div class="col-lg-2"></div>

            <?php if(get_sub_field('show_image_on_the_left')) { ?>

              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="center-content-left">
                  <div class="image-block">
                    <?php 
                      $image = get_sub_field('image_split');
                      if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                  </div>
                </div>

              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="center-content-left">
                  <div class="content-block">
                    <?php echo wp_kses_post( get_sub_field('text_column_split') ); ?>
                  </div>
                </div>

              </div>

            <?php } else { ?>

              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="center-content-left">
                  <div class="content-block">
                    <?php echo wp_kses_post( get_sub_field('text_column_split') ); ?>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="center-content-left">
                  <div class="image-block">
                    <?php 
                      $image = get_sub_field('image_split');
                      if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php } ?>

          <div class="col-lg-2"></div>
        </div>
      </div>
    </section>
  <?php } ?>

<?php endwhile; ?>
<?php } ?>