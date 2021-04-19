<!-- Footer Top Section -->
<div class="footer-top">
  <div class="module parallax">
    <div class="overlay-bg"></div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
          <div class="footer-logo">
            <a href="<?php echo home_url(); ?>" title="<?php bloginfo("name"); ?>" class="logo">
              <img src="<?php echo get_template_directory_uri() . '/medias/imgs/logo.png' ?>" alt="<?php bloginfo("name"); ?>">
              <div style="display:inline-block"><?php echo getBlogTitleOn2Lines(); ?></div>
            </a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9">
          <div class="footer-about-content"><?php bloginfo("description"); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>