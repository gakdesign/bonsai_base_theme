<?php 
/**
 * #.# Content Full Width Module
 *
 * Related CSS: assets/css/modules/content_full_width_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
$content_type = get_sub_field('content_type');
?>

<?php if ($content_type === 'text-content') : ?>

<?php if(get_sub_field('center_content')) { ?>
<section class="base-module-padding content_full_width_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <?php get_template_part('template-parts/snippets/content-block-intro'); ?>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
</section>
<?php } else { ?>
  <section class="base-module-padding content_full_width_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php get_template_part('template-parts/snippets/content-block-intro'); ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php elseif ($content_type === 'video-content') : ?>
<section class="base-module-padding content_full_width_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php get_template_part('template-parts/snippets/content-block-intro'); ?>
        <?php if ($video = get_sub_field('self_hosted_video')) : ?>
          <video controls>
            <source src="<?php echo esc_url($video); ?>" type="video/mp4" />
          </video>
        <?php elseif ($embed = get_sub_field('section_video')) : ?>
          <div class="videoWrapper"><?php echo $embed; // Consider filtering/sanitising if needed ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php elseif ($content_type === 'image-content') : ?>
<section class="base-module-padding content_full_width_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php get_template_part('template-parts/snippets/content-block-intro'); ?>
        <?php if ($image = get_sub_field('section_image')) : ?>
          <div class="image-block">
            <a href="<?php echo esc_url($image['url']); ?>" class="fancybox">
              <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'img-res']); ?>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>