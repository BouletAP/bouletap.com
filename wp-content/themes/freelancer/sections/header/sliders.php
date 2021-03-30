<?php    
    $wpquery = new WP_Query([
        'post_type' => 'sliders',
        'order' => "ASC",
        'suppress_filters' => false
    ]);
?>
<!-- Top Slider -->
<div class="main-top-slider">
  <div id="main-slider" class=""> 
    
    <?php
        if ( $wpquery->have_posts() ) { 
            while ( $wpquery->have_posts() ) { 
                $wpquery->the_post();
                get_template_part('sections/header/slide');
            }
        }
        wp_reset_postdata();
    ?>  

  </div>
</div>