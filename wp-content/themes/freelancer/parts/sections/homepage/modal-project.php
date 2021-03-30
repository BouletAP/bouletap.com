<?php $data = get_fields(get_the_ID()); ?>
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
                <h2><?php the_title(); ?></h2>
              </div>
              <div class="col-md-4 wow fadeInUp"> 

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
              <div class="col-md-8 wow fadeInUp"> 
                <!-- Project Description -->
                <h4 class="text-left"><?php _e("Project Description", "bouletap"); ?></h4>
                <?php the_content(); ?>
                <div class="space"></div>
                <!-- Shares -->
                <h4><?php _e("Share", "bouletap"); ?></h4>
                <div class="social-box-icon">
                  <a href="javascript:void(0);" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                  <a href="javascript:void(0);" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="javascript:void(0);" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a>
                  <a href="javascript:void(0);" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a>
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