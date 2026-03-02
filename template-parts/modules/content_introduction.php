<?php 
/**
 * #.# Content Introduction Module
 *
 * Related CSS: assets/css/modules/content_introduction.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding content_introduction">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block">
          <?php if(get_sub_field('section_header')) { ?>
          <h1><?php echo get_sub_field('section_header'); ?></h1>
          <?php } ?>
          <?php if(get_sub_field('section_content')) { ?>
          <?php echo get_sub_field('section_content'); ?>
          <?php } ?>

          <?php
          $cta_one = get_sub_field('section_cta_one');
          $cta_two = get_sub_field('section_cta_two');

          if ($cta_one && !$cta_two) :
              // Only CTA One
              $link_url = $cta_one['url'];
              $link_title = $cta_one['title'];
              $link_target = $cta_one['target'] ? $cta_one['target'] : '_self'; ?>
              <div class="single-cta">
                <a class="btn cta-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_attr($link_title); ?>">
                    <?php echo esc_html($link_title); ?>
                </a>
              </div>

          <?php elseif ($cta_one && $cta_two) :
              // Both CTA One and CTA Two
              $link1_url = $cta_one['url'];
              $link1_title = $cta_one['title'];
              $link1_target = $cta_one['target'] ? $cta_one['target'] : '_self';

              $link2_url = $cta_two['url'];
              $link2_title = $cta_two['title'];
              $link2_target = $cta_two['target'] ? $cta_two['target'] : '_self'; ?>
              <div class="two-ctas">
                <a class="btn cta-btn" href="<?php echo esc_url($link1_url); ?>" target="<?php echo esc_attr($link1_target); ?>" title="<?php echo esc_attr($link1_title); ?>">
                    <?php echo esc_html($link1_title); ?>
                </a>
                <a class="btn cta-btn" href="<?php echo esc_url($link2_url); ?>" target="<?php echo esc_attr($link2_target); ?>" title="<?php echo esc_attr($link2_title); ?>">
                    <?php echo esc_html($link2_title); ?>
                </a>
              </div>
          <?php endif; ?>
          <?php if ( get_sub_field('feature_gateway_links') ): ?>
            <div class="featured-gateway">
              <?php if ( have_rows('feature_gateway_links') ): ?>
                <?php while ( have_rows('feature_gateway_links') ): the_row(); ?>
                  <div>
                    <?php  
                      $link = get_sub_field('item_link'); 
                      $bg_image = get_sub_field('item_background_image'); 
                      $bg_style = $bg_image ? "background-image:url('" . esc_url($bg_image) . "');" : '';
                    ?>

                    <?php if ( $link ): 
                      $link_url = $link['url']; 
                      $link_title = $link['title']; 
                      $link_target = $link['target'] ? $link['target'] : '_self'; 
                    ?>
                      <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_attr($link_title); ?>">
                        <div class="featured-gateway-item background-image" style="<?php echo esc_attr($bg_style); ?>">
                          <div class="darken"></div>
                          <h2><?php echo esc_html(get_sub_field('item_header')); ?></h2>
                          <?php echo wp_kses_post(get_sub_field('item_introduction')); ?>
                          <div class="gateway-hidden"><?php echo wp_kses_post(get_sub_field('item_hover_content')); ?></div>
                        </div>
                      </a>
                    <?php else: ?>
                      <div class="featured-gateway-item background-image" style="<?php echo esc_attr($bg_style); ?>">
                        <div class="darken"></div>
                        <h2><?php echo esc_html(get_sub_field('item_header')); ?></h2>
                        <?php echo wp_kses_post(get_sub_field('item_introduction')); ?>
                        <div class="gateway-hidden"><?php echo wp_kses_post(get_sub_field('item_hover_content')); ?></div>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>
