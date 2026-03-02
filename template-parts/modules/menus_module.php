
<?php 
/**
 * #.# Menus Module
 *
 * Related CSS: assets/css/modules/menus_module.css
 * Related CSS (Global CSS): assets/css/style.css
 * 
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding menus_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <?php get_template_part('template-parts/snippets/content-block-intro');?>
      </div>
    </div>
    <div class="row row-eq-height gx-5">
      <?php
        $posts = get_sub_field('menus_to_show');
        if ($posts):
            foreach ($posts as $post):
                setup_postdata($post);
                get_template_part('template-parts/snippets/menu');
            endforeach;
            wp_reset_postdata();
        endif;
      ?>
    </div>
  </div>
</section>