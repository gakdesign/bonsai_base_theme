<section class="base-module-padding faq_module">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-block">
          <?php if(get_sub_field('section_header')) { ?>
            <?php if(get_sub_field('set_header_to_h1')) { ?>
              <h1><?php echo get_sub_field('section_header'); ?></h1>
            <?php } else { ?>
              <h2><?php echo get_sub_field('section_header'); ?></h2>
            <?php } ?>
          <?php } ?>
          <?php if(get_sub_field('section_introduction')) { ?><?php echo get_sub_field('section_introduction'); ?><?php } ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <?php if( have_rows('accordian_items') ){ ?>
        <div class="accordion accordion-flush bordered" id="accordionExamples">
          <?php $i = 0; ?>
          <?php while( have_rows('accordian_items') ): the_row(); ?>
            <div class="accordion-item">
              <h3 class="accordion-header" id="headingOne">
                <button class="accornu-<?php echo $i; ?> accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i; ?>">
                  <?php echo get_sub_field('item_title'); ?>
                </button>
              </h3>
              <div id="collapseOne-<?php echo $i; ?>" class="accordion-collapse collapse " aria-labelledby="headingOne-<?php echo $i; ?>" data-bs-parent="#accordionExamples">
                <div class="accordion-body content-block">
                  <?php echo get_sub_field('item_content'); ?>
                </div>
              </div>
            </div>
          <?php $i++;?>
          <?php endwhile; ?>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

