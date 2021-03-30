<!-- Contact Me Section -->
<section id="contact-me"> 
  <!-- Map Section -->
  <div class="google-map">
    <div id="cp-content-wrap">
      <div class="cp-google-map">
        <div id="map_canvas" class="map_canvas"></div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <!-- Contact Section -->
  <div class="container">
    <div id="contact-section-form" class="contact-section wow fadeInUp">
      <div class="row"> 
        <!-- Contact Form Left Section-->
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"> 
          <!-- Contact Form -->
          <div class="contact-main-section">
            <div class="small-title small-title-pad">
              <h3><?php _e("Have a question or want to make an appointment ?", "bouletap"); ?></h3>
            </div>
            <div id="main-form" class="contact-form-basic">
              <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="25"]'); ?>
            </div>
          </div>
        </div>
        <!-- Contact Form Right Section-->
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"> 
          <!-- Address Section -->
          <div class="small-title small-title-pad">
            <h3><?php _e("Join me anytime", "bouletap"); ?></h3>
          </div>
          <div class="contact-detail">
            <div class="details">
              <div class="fc-email"><i class="fa fa-envelope-o"></i><a href="mailto:apb@bouletap.com">apb@bouletap.com</a></div>
              <div class="fc-contact-no"><i class="fa fa-phone"></i><a href="tel:+4509553388">+450-955-3388</a></div>
            </div>
            <div class="details address">
              <h4><?php _e("Freelance Web Developer", "bouletap"); ?></h4>
              <p><?php _e("Main office", "bouletap"); ?><br/>
                <?php _e("104 Sud street, Office 260", "bouletap"); ?><br/>
                <?php _e("Cowansville", "bouletap"); ?>, QC<br/>
                J2K 2X2, Canada</p>
            </div>
            <div class="details follow-me hide">
              <h4><?php _e("Follow me", "bouletap"); ?></h4>
              <div class="social-box-icon"> 
                <a href="https://www.facebook.com/logicielsbouletap/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <a title="linkedin" target="_blank" href="https://www.linkedin.com/in/andr%C3%A9-philippe-boulet-50b2b216/"><i class="fa fa-linkedin"></i></a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>