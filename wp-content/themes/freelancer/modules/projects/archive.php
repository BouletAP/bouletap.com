<!-- section Breadcrumb -->
<div class="section-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h1 class="section-heading"><?php echo _e("Portfolio", "bouletap"); ?></h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i></a></li>
                        <li class="active"><?php echo _e("Portfolio", "bouletap"); ?></li>
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
                

                <?php  get_template_part('modules/projects/items-list'); ?>                
                                
                <?php  get_template_part('modules/projects/pagination'); ?>
                                
                

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> 
                <?php  //get_template_part('parts-archive/blog-post/sidebar'); ?>
                <?php  get_template_part('modules/projects/widget-categories'); ?>
                <?php  //get_template_part('parts-archive/blog-post/contact-form'); ?>
                <?php  //get_template_part('parts-archive/blog-post/recent-posts'); ?>
                <?php  //get_template_part('parts-archive/blog-post/popular-tags'); ?>                
            </div>
        </div>
    </div>
</div>
