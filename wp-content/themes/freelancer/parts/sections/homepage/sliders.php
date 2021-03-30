<?php    
    $wpquery = new WP_Query([
        'post_type' => 'sliders',
        'order' => "ASC"
    ]);
?>
<!-- Top Slider -->
<div class="main-top-slider">
  <div id="main-slider" class="owl-carousel"> 
    
    <?php
        if ( $wpquery->have_posts() ) { 
            while ( $wpquery->have_posts() ) { 
                $wpquery->the_post();
                get_template_part('parts/sections/homepage/slide');
            }
        }
        wp_reset_postdata();
    ?>  

  </div>
</div>