<?php

    $acfData = get_fields(get_the_ID());

?>
<script type="text/javascript">
  jQuery(document).ready(function () {
    "use strict";
    jQuery.noConflict();
    
    // PORTFOLIO SCRIPT
    try {
        jQuery('#portfolio-carousel<?php echo get_the_ID(); ?>').owlCarousel({
            loop: true,
            margin: 0, 
            nav: false,
            jumpTo: 2,
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
    } catch (err) {}
  });
</script>
<!-- Blog Single Post -->
<div class="blog-post-wrapper">
    <div class="blog-date bg-gray">
        <div class="month"> <?php echo formatMonthName(date('m', strtotime($acfData['start_date'])), true); ?></div>
        <div class="year"><?php echo date('Y', strtotime($acfData['start_date'])); ?></div>
    </div>
    <div class="blog-post-image">
        
    <?php if( !empty($acfData['image_main']) ): ?>
        <img src="<?php echo wp_get_attachment_url($acfData['image_main']); ?>" alt="<?php echo $acfData['displayed_title']; ?>" />
    <?php endif; ?>
    <div class="b-wrapper">
            <div class="socialnetworks blog-social-icon">
                <ul>
                    <li><a href="javascript:void(0);" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0);" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="b-top-line"></div>
    </div>
    <div class="blog-content">
        
        
    <?php if( !empty($acfData['project_vision']) ): ?>
        <h4 class="text-left"><?php _e("Project Description", "bouletap"); ?></h4>
        <div class="vision">
        <?php echo $acfData['project_vision']; ?>
        </div>
    <?php endif; ?>

    
    
    <?php if( !empty($acfData['project_contributions']) ): ?>
    
        <h5 class="text-left"><?php _e("Some task that I've completed", "bouletap"); ?></h5>
        <ul class="contributions">
        <?php foreach($acfData['project_contributions'] as $item ): ?>
            <li><?php echo $item['task']; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
    <h5 class="text-left"><?php _e("Other infos", "bouletap"); ?></h5>
    
    <div class="project-website">
        <?php if( !empty($acfData['project_website']) ): ?>
        <?php _e("Project Website:", "bouletap"); ?> <strong><a href="<?php echo $acfData['project_website']; ?>" target="_blank"><?php echo $acfData['project_website']; ?></a></strong>
        <?php endif; ?>
    </div>
    
    <div class="project-timeline">
        <?php if( !empty($acfData['start_date']) ): ?>
        <?php _e("Developed in ", "bouletap"); ?> <strong><?php echo formatProjectDate($acfData['start_date']); ?></strong>
        <?php if( !empty($acfData['project_eol']) ): ?>
        <?php _e("and the project was retired in ", "bouletap"); ?> <strong><?php echo formatProjectDate($acfData['project_eol'], true); ?></strong>
        <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="client-section">
    <?php if( !empty($acfData['client_name']) ): ?>
        <?php _e("Developed for:", "bouletap"); ?>
        <strong>
        <?php if( !empty($acfData['client_website']) ): ?>
            <a href="<?php echo $acfData['client_website']; ?>" target="_blank"><?php echo $acfData['client_name']; ?></a>
        <?php else: ?>
            <?php echo $acfData['client_name']; ?>
        <?php endif; ?>
        </strong>
        <?php if( !empty($acfData['client_description']) ): ?>
        <p><?php echo $acfData['client_description']; ?></p>
        <?php endif; ?>
    <?php endif; ?>
    </div>

    </div>
</div>
<!-- Blog Single Post End --> 