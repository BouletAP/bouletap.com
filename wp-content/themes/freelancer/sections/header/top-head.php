<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-3"> 
      <!-- Company Logo --> 
      <a href="<?php echo home_url(); ?>" title="<?php bloginfo("name"); ?>" class="logo">
        <img src="<?php echo get_template_directory_uri() . '/medias/imgs/logo.png' ?>" alt="<?php bloginfo("name"); ?>">
        <?php echo getBlogTitleOn2Lines(); ?>
      </a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-9"> 
      <!-- Social Network Start -->
      <div class="socialnetworks">
        <ul class="pull-right">
          <li class="li-phone"><a href="tel:4507752905" title="Phone"><i class="fa fa-phone"></i></a><span>450-775-2905</span></li>
          <li class="li-social"><a href="https://www.facebook.com/logicielsbouletap/"itle="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li class="li-social"><a href="https://www.linkedin.com/in/andr%C3%A9-philippe-boulet-50b2b216/" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
          <li class="language-switcher"><?php do_action('icl_language_selector'); ?></li>
        </ul>
      </div>
      <!-- Social Network End --> 
    </div>
  </div>
</div>