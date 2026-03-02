<?php 
/**
 * #.# Breadcrumbs Module
 *
 * Related CSS: assets/css/modules/breadcrumbs_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<?php
$post_type = get_post_type();

$crumb_map = [
  'event' => [
    'label' => "What's On",
    'url'   => home_url('/whats-on/'),
  ],
  'menu' => [
    'label' => 'Menus',
    'url'   => home_url('/menus/'),
  ],
  'accommodation' => [
    'label' => 'Accommodation',
    'url'   => home_url('/accommodation/'),
  ],
];

$crumb = isset($crumb_map[$post_type]) ? $crumb_map[$post_type] : null;
?>
<section class="base-module-padding breadcrumbs_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav class="content-block content-block-linked" aria-label="Breadcrumb">
          <?php if ( $crumb ) : ?>
            <p id="breadcrumbs">
              <span>
                <span>
                  <a title="Home" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                </span>
                /
                <span>
                  <a title="<?php echo esc_attr( $crumb['label'] ); ?>" href="<?php echo esc_url( $crumb['url'] ); ?>">
                    <?php echo esc_html( $crumb['label'] ); ?>
                  </a>
                </span>
                /
                <span class="breadcrumb_last" aria-current="page">
                  <?php echo esc_html( get_the_title() ); ?>
                </span>
              </span>
            </p>
          <?php else : ?>
            <?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
              <?php yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' ); ?>
            <?php else : ?>
              <p id="breadcrumbs">
                <span>
                  <span>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                  </span>
                  /
                  <span class="breadcrumb_last" aria-current="page">
                    <?php echo esc_html( get_the_title() ); ?>
                  </span>
                </span>
              </p>
            <?php endif; ?>
          <?php endif; ?>
        </nav>
      </div>
    </div>
  </div>
</section>