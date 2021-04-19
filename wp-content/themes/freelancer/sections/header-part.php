<!-- Site Loder-->
<div id="loader-wrapper">
  <div id="loader"></div>
  <div class="loading-text">Loading...</div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
  
<?php get_template_part("sections/menu-principal"); ?>

<!-- Header End--> 

<!-- Top Part Start-->
<div class="main-top-section <?php echo is_front_page() ? '' : 'inner-section';?>"> 
  
  <?php //get_template_part('sections/header/menu-principal'); ?>

  <?php if( is_front_page() ): ?>
    <!-- Top Slider -->
    <div class="main-top-slider">
      <div id="main-slider" class=""> 
        
        <div class="item">
            <div class="overlay-slider"></div>
            <img src="/wp-content/uploads/apple-black-and-white-black-and-white-169573.jpg" alt="<?php _e('Website development expert', 'bouletap'); ?>">
            <div class="slider-text-section">
            <div class="container">
                <div class="slider-text">
                    <div class="slider-title to-animate"><h1><?php _e('Website development expert', 'bouletap'); ?></h1></div>
                    <div class="to-animate">
                      <h2><?php _e('Andre-Philippe Boulet // BouletAP Software', 'bouletap'); ?></h2>
                      <p><?php _e('At your service to solve your web problems, build a website with your branding or to answer your questions about online commerce', 'bouletap'); ?></p>
                    </div>
                    
                    <div class="list-btn to-animate">
                      <a href="tel:4507752905" class="btns" title="<?php _e("Call me now about your project", 'bouletap'); ?>"><?php _e("Call me now about your project", 'bouletap'); ?><span><i class="fa fa-long-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
            </div>
        </div>

      </div>
    </div>
  <?php endif; ?>
  
</div>
<!-- Top Part End--> 

<?php get_template_part('sections/header-lead'); ?>