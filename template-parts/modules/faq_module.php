<?php 
/**
 * #.# FAQ Module
 *
 * Related CSS: assets/css/modules/faq_module.css
 * Related CSS (Global CSS): assets/css/core/base.css
 * Related JS (Global scripts): assets/js/main.js
**/
?>
<section class="base-module-padding faq_module_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="faq_module">
          <div class="row gx-5">
            <div class="col-xl-4 col-lg-6">
              <div class="faq-list faq-list-one">
                <div class="content-block">
                  <h3>FAQS</h3>
                </div>
                <?php if( have_rows('faq_items_column_one') ){ ?>
                <div class="accordion" id="faq_listone">
                  <?php $i = 0; ?>
                  <?php while( have_rows('faq_items_column_one') ): the_row(); ?>
                    <div class="accordion-item">
                      <div class="accordion-header">
                          <?php echo get_sub_field('faq_title'); ?>
                      </div>
                      <div class="accordion-content content-block">
                        <?php echo get_sub_field('faq_content'); ?>
                      </div>
                    </div>  
                  <?php $i++;?>
                  <?php endwhile; ?>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="faq-list faq-list-two">
                <?php if( have_rows('faq_items_column_two') ){ ?>
                <div class="accordion" id="faq_listtwo">
                  <?php $i = 0; ?>
                  <?php while( have_rows('faq_items_column_two') ): the_row(); ?>
                    <div class="accordion-item">
                      <div class="accordion-header">
                          <?php echo get_sub_field('faq_title'); ?>
                      </div>
                      <div class="accordion-content content-block">
                        <?php echo get_sub_field('faq_content'); ?>
                      </div>
                    </div>  
                  <?php $i++;?>
                  <?php endwhile; ?>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="col-xl-4 col-lg-12">
              <div class="faq-list faq-list-specials">
                <?php if( have_rows('feature_cta') ){ ?>
                <?php while( have_rows('feature_cta') ): the_row(); ?>
                  <div class="faq-featured-link content-block text-center">
                    <h3><?php echo get_sub_field('cta_title'); ?></h3>
                    <?php echo get_sub_field('cta_content'); ?>
                    <?php  $link = get_sub_field('cta_link'); if( $link ): $link_url = $link['url']; $link_title = $link['title'];$link_target = $link['target'] ? $link['target'] : '_self'; ?>
                      <a class="btn cta-btn bronze-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>" role="button"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>