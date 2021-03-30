<?php    
    $projects = array();
    $wpquery = new WP_Query([
        'post_type' => 'projects',
        'order' => "DESC"
    ]);
    
    // build projects
    /*if ( $wpquery->have_posts() ) {
        while ($wpquery->have_posts()) {
            $wpquery->the_post();
            $data = get_fields(get_the_ID());

            $project = new stdClass();
            $project->ID = get_the_ID();
            $project->ID = get_the_ID();
        }
    }*/
?>
<!-- Portfolio Section -->
<section id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-12 section-heading text-center">
        <h2>Projets récents</h2>
      </div>
      <div class="col-md-12 text-center">
        <p>Cliquez sur l'icône d'un projet pour en apprendre davantage. Chaque projet est unique alors il nous fait toujours plaisir de discuter de sa vision et des innovations mises en place pour la réaliser.</p>
      </div>
    </div>
  </div>
  <div class="portfolio-main wow fadeInUp">
    <div class="row">
      <div class="work-filter">
        <ul class="text-center">
          <li><a href="javascript:;" data-filter="all" class="active filter"><span>All</span></a></li>
          <li><a href="javascript:;" data-filter=".website-wordpress" class="filter"><span>Site Internet - Wordpress</span></a></li>
          <li><a href="javascript:;" data-filter=".others" class="filter"><span>Others</span></a></li>
        </ul>
      </div>
    </div>
    <div class="project-wrapper" id="project-wrapper">
      
        <?php if ( $wpquery->have_posts() ): while ($wpquery->have_posts()): $wpquery->the_post(); ?>
            <?php $data = get_fields(get_the_ID()); ?>
            
            <div class="mix work-item website-wordpress">
                <figure class="effect-zoe">
                    <img src="<?php echo wp_get_attachment_url($data['image_thumb']); ?>" alt="">
                    <figcaption>
                        <div class="project-title">
                        <div class="project-title-h4"><a data-toggle="modal" data-target="#projectModal<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></div>
                            <p>Site Internet - Wordpress</p>
                        </div>
                        <p class="icon-links project-view"><a data-toggle="modal" data-target="#projectModal<?php echo get_the_ID(); ?>"><i class="fa fa-eye has-circle"></i></a></p>
                    </figcaption>
                </figure>
            </div>
            
            <?php get_template_part('parts/sections/homepage/modal-project'); ?>

        <?php endwhile; wp_reset_postdata(); endif; ?>
      


      
      
      
    </div>

  </div>
</section>