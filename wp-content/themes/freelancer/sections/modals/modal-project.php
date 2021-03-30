<?php 
$data = get_fields(get_the_ID()); 

//echo "<pre>"; print_r($data); echo "</pre>";
?>

<script type="text/javascript">
  jQuery(document).ready(function () {
    "use strict";
    jQuery.noConflict();
    
    // PORTFOLIO SCRIPT
    try {
        jQuery('#projectModal<?php echo get_the_ID(); ?>').on('shown.bs.modal', function (e) {
            jQuery('#portfolio-carousel<?php echo get_the_ID(); ?>').owlCarousel({
                loop: true,
                margin: 0, 
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
    } catch (err) {}
  });
</script>

<!-- Modal -->
<div id="projectModal<?php echo get_the_ID(); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    <!-- Modal Content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="portfolio-pop">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section-heading text-center wow fadeInUp"> 
                <!-- Project Title -->
                <h2><?php echo $data['displayed_title']; ?></h2>
              </div>
              <div class="col-lg-6  col-md-4 wow fadeInUp"> 

              <?php if( !empty($data['image_gallery']) ): ?>
                <!-- Project Slider -->
                <div id="portfolio-carousel<?php echo get_the_ID(); ?>" class="owl-carousel">
                  <?php foreach($data['image_gallery'] as $item): ?>
                    <div class="item"> 
                      <img src="<?php echo wp_get_attachment_url($item['image']); ?>" alt="<?php echo $item['title']; ?>" /> 
                    </div>
                  <?php endforeach; ?>
                </div>                
              <?php endif; ?>

              </div>
              <div class="col-lg-6 col-md-8 wow fadeInUp"> 
                <!-- Project Description -->
                
                <?php if( !empty($data['project_vision']) ): ?>
                  <h4 class="text-left"><?php _e("Project Description", "bouletap"); ?></h4>
                  <div class="vision">
                    <?php echo $data['project_vision']; ?>
                  </div>
                <?php endif; ?>
                
                <?php if( !empty($data['project_contributions']) ): ?>
                
                  <h5 class="text-left"><?php _e("Some task that I've completed", "bouletap"); ?></h5>
                  <ul class="contributions">
                    <?php foreach($data['project_contributions'] as $item ): ?>
                        <li><?php echo $item['task']; ?></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
                
                <h5 class="text-left"><?php _e("Other infos", "bouletap"); ?></h5>
                
                <div class="project-website">
                  <?php if( !empty($data['project_website']) ): ?>
                  <?php _e("Project Website:", "bouletap"); ?> <strong><a href="<?php echo $data['project_website']; ?>" target="_blank"><?php echo $data['project_website']; ?></a></strong>
                  <?php endif; ?>
                </div>
                
                <div class="project-timeline">
                  <?php if( !empty($data['start_date']) ): ?>
                  <?php _e("Developed in ", "bouletap"); ?> <strong><?php echo formatProjectDate($data['start_date']); ?></strong>
                    <?php if( !empty($data['project_eol']) ): ?>
                    <?php _e("and the project was retired in ", "bouletap"); ?> <strong><?php echo formatProjectDate($data['project_eol'], true); ?></strong>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>

                <div class="client-section">
                <?php if( !empty($data['client_name']) ): ?>
                  <?php _e("Developed for:", "bouletap"); ?>
                  <strong>
                    <?php if( !empty($data['client_website']) ): ?>
                      <a href="<?php echo $data['client_website']; ?>" target="_blank"><?php echo $data['client_name']; ?></a>
                    <?php else: ?>
                      <?php echo $data['client_name']; ?>
                    <?php endif; ?>
                  </strong>
                  <?php if( !empty($data['client_description']) ): ?>
                    <p><?php echo $data['client_description']; ?></p>
                  <?php endif; ?>
                <?php endif; ?>
                </div>
                

                <div class="space"></div>
                <!-- Shares -->
                <h4><?php _e("Share", "bouletap"); ?></h4>
                <div class="social-box-icon">
                  <a href="javascript:void(0);" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a>
                </div>
                <!-- End: Project Description and Share --> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>