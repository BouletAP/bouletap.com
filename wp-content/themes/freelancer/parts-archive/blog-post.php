
<!-- Blog Post Section -->
<div class="fullwidth-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12"> 
                
                <?php  get_template_part('parts-archive/blog-post/blog-post'); ?>
                <?php  get_template_part('parts-archive/blog-post/blog-pagination'); ?>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> 
                <?php  get_template_part('parts-archive/blog-post/sidebar'); ?>
                <?php  get_template_part('parts-archive/blog-post/categories'); ?>
                <?php  get_template_part('parts-archive/blog-post/contact-form'); ?>
                <?php  get_template_part('parts-archive/blog-post/recent-posts'); ?>
                <?php  get_template_part('parts-archive/blog-post/archives'); ?>
                <?php  get_template_part('parts-archive/blog-post/popular-tags'); ?>
                <?php  get_template_part('parts-archive/blog-post/testimonials'); ?>
                
            </div>
        </div>
    </div>
</div>