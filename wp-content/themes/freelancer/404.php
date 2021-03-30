<?php
get_header(); ?>

  
<!-- section Breadcrumb -->
<div class="section-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h1 class="section-heading">Page Not Found</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                        <li class="active">Page not found</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Page not found Section -->
<div class="fullwidth-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="error-section">
                    <img src="<?php echo get_template_directory_uri() . '/medias/images/404-image.png' ?>" alt="404">
                    <h2>Sorry:(</h2>
                    <div class="small-title">This Page Could Not Be Found!</div>
                    <p>The page you were looking for appears to have been moved, deleted or does not exist.</p>
                    <p>You could go back to where you were or head straight to our home page.</p>
                    <a title="Download Resume" class="btns btns-primary" href="javascript:void(0);"><span><i class="fa fa-long-arrow-left"></i></span>GO to home page</a> </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
