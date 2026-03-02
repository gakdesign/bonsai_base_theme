<?php 
/**
 * #.# Content Split Width Module
 *
 * Related CSS: assets/css/modules/content_split_width.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding content_split_width">
  <div class="container">
    <div class="row row-eq-height gx-5">
      <div class="col-lg-6">
      <?php if( get_sub_field('left_column_content_type') == 'text-content' ) { ?>

        <section class="base-module-padding content_split_width">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <?php get_template_part('template-parts/snippets/content-block-intro');?>
              </div>
            </div>
          </div>
        </section>
            
        <?php } elseif( get_sub_field('left_column_content_type') == 'video-content' ) { ?>

        <section class="base-module-padding content_split_width">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <?php get_template_part('template-parts/snippets/content-block-intro');?>
                <?php if(get_sub_field('self_hosted_video')) { ?>
                  <video controls>
                    <source src="<?php echo get_sub_field('self_hosted_video'); ?>" type="video/mp4" />
                  </video>
                <?php } else { ?>
                  <div class="videoWrapper"><?php echo get_sub_field('section_video'); ?></div>
                <?php } ?>
              </div>
            </div>
          </div>
        </section>

        <?php } elseif( get_sub_field('left_column_content_type') == 'image-content' ) { ?>

        <section class="base-module-padding content_split_width">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <?php get_template_part('template-parts/snippets/content-block-intro');?>
                <div class="image-block">
                  <?php
                    $image = get_sub_field('section_image');
                    $size = 'full';
                    $attributes = array(
                      'class' => 'img-res', // Add your desired class here
                    );
                    echo wp_get_attachment_image($image, $size, false, $attributes);
                  ?>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php } ?>
      </div>
      <div class="col-lg-6">
      <?php if( get_sub_field('right_column_content_type') == 'text-content' ) { ?>

        <section class="base-module-padding content_split_width">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <?php get_template_part('template-parts/snippets/content-block-intro');?>
              </div>
            </div>
          </div>
        </section>
            
        <?php } elseif( get_sub_field('right_column_content_type') == 'video-content' ) { ?>

        <section class="base-module-padding content_split_width">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <?php get_template_part('template-parts/snippets/content-block-intro');?>
                <?php if(get_sub_field('self_hosted_video_right')) { ?>
                  <video controls>
                    <source src="<?php echo get_sub_field('self_hosted_video_right'); ?>" type="video/mp4" />
                  </video>
                <?php } else { ?>
                  <div class="videoWrapper"><?php echo get_sub_field('section_video_right'); ?></div>
                <?php } ?>
              </div>
            </div>
          </div>
        </section>

        <?php } elseif( get_sub_field('right_column_content_type') == 'image-content' ) { ?>

        <section class="base-module-padding content_split_width">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <?php get_template_part('template-parts/snippets/content-block-intro');?>
                <div class="image-block">
                  <?php
                    $image = get_sub_field('section_image_right');
                    $size = 'full';
                    $attributes = array(
                      'class' => 'img-res', // Add your desired class here
                    );
                    echo wp_get_attachment_image($image, $size, false, $attributes);
                  ?>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php } ?>
      </div>
    </div>
  </div>
</section>