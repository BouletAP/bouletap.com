<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo site_url() . '/favicon.png' ?>">
  <?php wp_head(); ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if gte IE 9]><link rel="stylesheet" type="text/css" href="css/ie9.css" /><![endif]-->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body id="page-top" <?php body_class(); ?> >
  <div id="wrapper" class="wrapper-main">
  
    <!-- Site Loder-->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loading-text">Loading...</div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    
    <!-- Header Start-->
    <header id="main-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-4 col-xs-3"> 
            
            <!-- Company Logo --> 
            <div class="company-logo header">            	
              <a href="<?php echo home_url(); ?>" title="<?php bloginfo("name"); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri() . '/medias/imgs/logo.png' ?>" alt="<?php bloginfo("name"); ?>">
                <?php echo getBlogTitleOn2Lines(); ?>
              </a>
            </div>
            
          </div>
          <div class="col-lg-6 col-md-6 col-sm-8 col-xs-9"> 
            <!-- Social Network Start -->
            <div class="socialnetworks">
              <ul class="pull-right">
                <li class="li-phone"><a href="tel://4509553388" title="Phone"><i class="fa fa-phone"></i></a><span>450-955-3388</span></li>
                <li class="li-social"><a href="https://www.facebook.com/logicielsbouletap/"itle="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li class="li-social"><a href="https://www.linkedin.com/in/andr%C3%A9-philippe-boulet-50b2b216/" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <!--<li class="li-social"><a href="#" title="User Login"><i class="fa fa-user"></i></a></li>-->
                <li class="language-switcher"><?php do_action('icl_language_selector'); ?></li>
              </ul>
            </div>
            <!-- Social Network End --> 
          </div>
        </div>
      </div>    
    </header>
    <!-- Header End--> 
    
    <!-- Top Part Start-->
    <div class="main-top-section <?php echo is_front_page() ? '' : 'inner-section';?>"> 
      
      <?php get_template_part('sections/header/menu-principal'); ?>

      <?php if( is_front_page() ): ?>
        <?php get_template_part('sections/header/sliders'); ?>
      <?php endif; ?>
      
    </div>
    <!-- Top Part End--> 