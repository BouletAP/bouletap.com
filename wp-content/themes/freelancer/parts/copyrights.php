<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
?>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6">
      <div class="copyright-text wow fadeInUp">&copy; <?php echo date('Y'); ?> - <?php bloginfo("name"); ?> <?php _e("All rights reserved.", "bouletap"); ?></div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-6">
      <div class="footer-social-icons wow fadeInUp">
        <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
        <a title="linkedin" target="_blank" href="https://www.linkedin.com/in/andr%C3%A9-philippe-boulet-50b2b216/"><i class="fa fa-linkedin"></i></a> 
        <?php echo \BouletAP\WPHelper\WPML::getSwitcher(); ?>
      </div>
    </div>
  </div>
</div>