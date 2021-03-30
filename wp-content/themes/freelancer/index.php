<?php


get_header(); ?>

  
  <?php get_template_part('sections/about'); ?>

  <!-- Services Section -->
  <section id="services">
    <div class="container wow"> 
      <?php get_template_part('sections/services'); ?>    
    </div>
  </section>
  
  <?php //get_template_part('sections/skills'); ?>
  
  <?php get_template_part('sections/projects'); ?>
  
  <?php get_template_part('sections/work-process'); ?>

  <?php //get_template_part('sections/testimonials'); ?>
  
  <?php //get_template_part('sections/blog'); ?>
  
  <?php get_template_part('sections/contact'); ?>

<?php get_footer(); ?>