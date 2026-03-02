<?php 
/**
 * #.# Whats On Module
 *
 * Related CSS: assets/css/modules/whats_on_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding whats_on_module">
  <div class="darken-me-listings"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <?php get_template_part('template-parts/snippets/content-block-intro');?>
      </div>
    </div>
    <div class="row">
      <?php if(get_sub_field('or_show_the_latest_events')) { ?>
        <div class="whats-on-slider">
          <?php 
            $current_id = get_the_ID(); 
            $args = array(
            'post_type' => 'event',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'post__not_in'   => array( $current_id ), 
            );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post(); 
          ?>
            <div>
              <div class="whats-on-item text-center">
                <a href="<?php the_permalink() ?>">
                  <?php if(get_field('listing_image')) { ?>
                    <div class="listing-f-image background-image" style="background-image: url('<?php echo get_field('listing_image');?>')">
                    </div>
                  <?php } else { ?>
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                    <div class="listing-f-image background-image" style="background-image: url('<?php echo $backgroundImg[0]; ?>')">
                  <?php } ?>
                  <h3><?php echo get_field('listing_title');?></h3>
                  <?php echo get_field('listing_excerpt'); ?>
                </a>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      <?php } elseif( have_rows('grid_item') ){ ?>
        <div class="whats-on-slider">
        <?php $i = 0; ?>
        <?php while( have_rows('grid_item') ): the_row(); ?>
          <div>
            <div class="whats-on-item text-center">
              <a href="<?php echo get_sub_field('grid_link'); ?>">
                <?php if(get_sub_field('grid_image')) { ?>
                  <?php 
                  $image = get_sub_field('grid_image'); 
                  if( $image ): ?>
                    <div class="listing-f-image background-image" style="background-image: url('<?php echo esc_url($image['url']); ?>')"></div>
                  <?php endif; ?>
                <?php } else { ?>
                  <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                  <div class="listing-f-image background-image" style="background-image: url('<?php echo $backgroundImg[0]; ?>')">
                <?php } ?>
                <h3><?php echo get_sub_field('grid_header');?></h3>
                <?php echo get_sub_field('grid_content'); ?>
              </a>
            </div>
          </div>
        <?php $i++;?>
        <?php endwhile; ?>
        </div>
      <?php } ?>

    </div>
  </div>
</section>
