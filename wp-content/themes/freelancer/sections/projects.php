<?php    
    $projects = array();
    $wpquery = new WP_Query([
        'post_type' => 'projects',
        'meta_key' => 'start_date',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => "8"
    ]);

?>
<!-- Portfolio Section -->
<section id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-12 section-heading text-center">
        <h2><?php _e("Project done", "bouletap"); ?></h2>
      </div>
      <div class="col-md-12 text-center">
        <p><?php _e("Here is a preview of some project I did in the past. Some of them I did alone, some are projects that I contributed to or wanted to realize and some of them were while working with awesome people in professional agencies.", "bouletap"); ?></p>
      </div>
    </div>
  </div>
  <div class="portfolio-main wow">
    <div class="row">
      <div class="work-filter">
        <ul class="text-center">
          <li><a href="javascript:;" data-filter="all" class="active filter"><span>All</span></a></li>
          <li><a href="javascript:;" data-filter=".wordpress" class="filter"><span><?php _e("WordPress", "bouletap"); ?></span></a></li>
          <li><a href="javascript:;" data-filter=".dev-sur-mesure" class="filter"><span><?php _e("Custom Website", "bouletap"); ?></span></a></li>
          <li><a href="javascript:;" data-filter=".e-commerce" class="filter"><span><?php _e("E-Commerce", "bouletap"); ?></span></a></li>
          <li><a href="javascript:;" data-filter=".application-mobile" class="filter"><span><?php _e("Mobile App", "bouletap"); ?></span></a></li>          
        </ul>
      </div>
    </div>
    <div class="project-wrapper" id="project-wrapper">
      
        <?php if ( $wpquery->have_posts() ): while ($wpquery->have_posts()): $wpquery->the_post(); ?>
            <?php $data = get_fields(get_the_ID()); ?>
            
            <div class="mix work-item <?php echo implode(" ", extractProjectTerms(get_the_ID(), 'slug')); ?>">
                <figure class="effect-zoe">
                    <img src="<?php echo wp_get_attachment_url($data['image_thumb']); ?>" alt="<?php echo sprintf(__("Website developed by Logiciels BouletAP - Main snapshot of %s", "bouletap"), get_the_title()); ?>">
                    <figcaption>
                        <div class="project-title">
                        <div class="project-title-h4">
                          <a href="<?php echo get_permalink(get_the_ID()); ?>" title="<?php echo sprintf(__("Website creation of %s - Project developed by BouletAP Software", "bouletap"), get_the_title()); ?>"><?php the_title(); ?></a></div>
                            <p>WordPress website</p>
                        </div>
                        <p class="icon-links project-view"><a title="<?php echo sprintf(__("Developing website for %s - View details of the project done by BouletAP Software", "bouletap"), get_the_title()); ?>" href="<?php echo get_permalink(get_the_ID()); ?>"><i class="fa fa-eye has-circle"></i></a></p>
                    </figcaption>
                </figure>
            </div>
            
            <?php //get_template_part('sections/modals/modal-project'); ?>

        <?php endwhile; wp_reset_postdata(); endif; ?>
      
    </div>

  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center"> 
        <p><a href="<?php echo get_post_type_archive_link('projects') . "page/3/"; ?>" class="btns btns-primary"><?php _e("View complete portfolio", "bouletap"); ?></a></p>
      </div>
    </div>
  </div>
</section>