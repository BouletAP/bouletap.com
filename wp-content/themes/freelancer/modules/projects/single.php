<?php

    $acfData = get_fields(get_the_ID());

?>
<!-- section Breadcrumb -->
<div class="section-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h1 class="section-heading"><?php echo $acfData['displayed_title']; ?></h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i></a></li>
                        <li><a href="<?php echo site_url( '/projects/'); ?>"><i class="fa fa-list"></i></a></li>
                        <li class="active"><?php echo $acfData['displayed_title']; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Blog Post Section -->
<div class="fullwidth-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php  get_template_part('modules/projects/single-content'); ?>
                <?php  //get_template_part('parts-single/blog-post/blog-tags'); ?>
                <?php  //get_template_part('parts-single/blog-post/blog-comments'); ?>
                <?php  //get_template_part('parts-single/blog-post/blog-post-comments'); ?>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> 
                <?php  //get_template_part('parts-archive/blog-post/sidebar'); ?>
                <?php  get_template_part('modules/projects/widget-terms'); ?>
                <?php  //get_template_part('parts-archive/blog-post/categories'); ?>

                <?php if( !empty($acfData['image_gallery']) && count($acfData['image_gallery']) > 1 ): ?>
                    <div class="project-slider box">
                        <!-- Project Slider -->
                        <div id="portfolio-carousel<?php echo get_the_ID(); ?>" class="owl-carousel">
                            <?php foreach(array_reverse($acfData['image_gallery']) as $item): ?>
                            <div class="item"> 
                                <img src="<?php echo wp_get_attachment_url($item['image']); ?>" alt="<?php echo get_post_meta( $item['image'], '_wp_attachment_image_alt', true); ?>" /> 
                            </div>
                            <?php endforeach; ?>
                        </div>                
                    </div>
                <?php endif; ?>

                <?php  //get_template_part('parts-archive/blog-post/contact-form'); ?>
                <?php  //get_template_part('parts-archive/blog-post/recent-posts'); ?>
                <?php  //get_template_part('parts-archive/blog-post/archives'); ?>
                <?php  //get_template_part('parts-archive/blog-post/popular-tags'); ?>
                <?php  //get_template_part('parts-archive/blog-post/testimonials'); ?>
            </div>
        </div>
    </div>
</div>


