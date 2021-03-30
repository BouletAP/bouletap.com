<?php    
    $wpquery = new WP_Query([
        'post_type' => 'services',
        'order' => "ASC"
    ]);
?>
<!-- Services Section -->
<section id="services">
  <div class="container wow fadeInUp"> 
    <!-- Services Section Top -->
    <div class="row">
      <div class="col-md-12 section-heading text-center">
        <h2><?php _e("Offered services", "bouletap"); ?></h2>
      </div>
      <div class="col-md-12 text-center">
        <p><?php _e("With many years of experience in the industry, a constant passion for technology and our hard work, our know-how is limitless. Here are some of our specialties.", "bouletap"); ?></p>
      </div>
    </div>
    <div class="row"> 
        <?php
            if ( $wpquery->have_posts() ) { 
                while ( $wpquery->have_posts() ) { 
                    $wpquery->the_post();
                    get_template_part('parts/sections/homepage/service');
                }
            }
            wp_reset_postdata();
        ?>
    </div>
  </div>
</section>