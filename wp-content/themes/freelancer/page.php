<?php
get_header(); ?>

<!-- section Breadcrumb -->
<div class="section-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h2 class="section-heading"><?php the_title(); ?></h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i></a></li>
                        <li class="active"><?php the_title(); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Main Section -->
<div class="fullwidth-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="content-section">
                    <?php the_content(); ?>
                </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
