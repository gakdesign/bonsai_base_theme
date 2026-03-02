<?php 
/**
 * #.# Content Split Width Module
 *
 * Related CSS: assets/css/modules/content_split_width_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<?php
// --- Helper: first populated sub field (guarded) ---
if (!function_exists('bonsai_get_first_populated_sub_field')) {
  function bonsai_get_first_populated_sub_field($keys = array()) {
    foreach ($keys as $key) {
      $val = get_sub_field($key);
      if (!empty($val)) {
        return $val;
      }
    }
    return null;
  }
}

// --- Helper: normalise ACF image (ID or array) (guarded) ---
if (!function_exists('bonsai_normalise_acf_image')) {
  function bonsai_normalise_acf_image($image_field) {
    // If array (ACF return = array)
    if (is_array($image_field)) {
      $id  = isset($image_field['ID']) ? (int) $image_field['ID'] : 0;
      $url = isset($image_field['url']) ? $image_field['url'] : ($id ? wp_get_attachment_image_url($id, 'full') : '');
      return array('id' => $id, 'url' => $url);
    }
    // If numeric ID
    if (is_numeric($image_field)) {
      $id  = (int) $image_field;
      $url = wp_get_attachment_image_url($id, 'full');
      return array('id' => $id, 'url' => $url);
    }
    // If string URL
    if (is_string($image_field)) {
      return array('id' => 0, 'url' => $image_field);
    }
    return array('id' => 0, 'url' => '');
  }
}

// --- Renderer: split column with fallbacks (guarded) ---
if (!function_exists('bonsai_render_content_split_column')) {
  function bonsai_render_content_split_column($side = 'left') {
    $type       = get_sub_field("{$side}_column_content_type");
    $intro_part = 'template-parts/snippets/content-block-intro';

    // Side-aware fallback chains (right prefers *_right, left prefers legacy unsuffixed)
    $video_self_chain  = ($side === 'right')
      ? array('self_hosted_video_right', 'self_hosted_video')
      : array('self_hosted_video', 'self_hosted_video_left');

    $video_embed_chain = ($side === 'right')
      ? array('section_video_right', 'section_video')
      : array('section_video', 'section_video_left');

    $image_chain       = ($side === 'right')
      ? array('section_image_right', 'section_image')
      : array('section_image', 'section_image_left');

    if ($type === 'text-content') {
      get_template_part($intro_part);

    } elseif ($type === 'video-content') {
      get_template_part($intro_part);

      $self_hosted = bonsai_get_first_populated_sub_field($video_self_chain);
      if (!empty($self_hosted)) { ?>
        <video controls>
          <source src="<?php echo esc_url($self_hosted); ?>" type="video/mp4" />
        </video>
      <?php } else {
        $embed = bonsai_get_first_populated_sub_field($video_embed_chain);
        if (!empty($embed)) { ?>
          <div class="videoWrapper">
            <?php
              // If you need iframes preserved, wp_kses_post may strip them depending on allowed tags
              // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
              echo $embed;
            ?>
          </div>
        <?php }
      }

    } elseif ($type === 'image-content') {
      get_template_part($intro_part);

      $image_raw = bonsai_get_first_populated_sub_field($image_chain);
      $image     = bonsai_normalise_acf_image($image_raw);

      if (!empty($image['url'])) { ?>
        <div class="image-block">
          <a href="<?php echo esc_url($image['url']); ?>" class="fancybox">
            <?php
              if ($image['id']) {
                echo wp_get_attachment_image($image['id'], 'full', false, array('class' => 'img-res'));
              } else {
                // Fallback if only URL available
                ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="" class="img-res" />
                <?php
              }
            ?>
          </a>
        </div>
      <?php }
    }
  }
}
?>

<section class="base-module-padding content_split_width_module">
  <div class="container">
    <div class="row row-eq-height gx-5">
      <div class="col-lg-6">
        <?php bonsai_render_content_split_column('left'); ?>
      </div>
      <div class="col-lg-6">
        <?php bonsai_render_content_split_column('right'); ?>
      </div>
    </div>
  </div>
</section>
