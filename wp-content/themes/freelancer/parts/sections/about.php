<?php 

	$about_data = get_posts(array(
		'numberposts'	=> -1,
		'suppress_filters'	=> 0,
		'post_type'		=> 'sections',
		'meta_query'	=> array(
			array(
				'key'	 	=> 'unique_label',
				'value'	  	=> "about-me"
			)
		),
	));
	
	if( !empty($about_data) )  {
		$about_data = array_shift($about_data);
		$about_data->custom_data = get_fields($about_data->ID);
	}

?>
<!-- About Section -->
<section id="about-me">
	<div class="container">
	  <div class="row wow fadeInUp">
	    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
	      <div class="section-heading section-heading-pad"><?php _e("BouletAP Software", "bouletap"); ?></div>
	      <div class="about-details">
	        
					<?php echo apply_filters('the_content', $about_data->post_content); ?>
	        <a href="<?php echo wp_get_attachment_url(239); ?>" target="_blank" class="btns btns-primary" title="<?php _e("Download my CV", "bouletap"); ?>"><?php _e("Download my CV", "bouletap"); ?><span><i class="fa fa-long-arrow-right"></i></span></a> 
	        <a href="#contact-section-form" class="btns btns-primary" title="<?php _e("Contact", "bouletap"); ?>"><?php _e("Contact", "bouletap"); ?><span><i class="fa fa-long-arrow-right"></i></span></a> 
	    	</div>
	    </div>
	    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
	      <ul class="about-icon-box">

					<?php if( !empty($about_data->custom_data['additional_data']) ): ?>
					<?php foreach($about_data->custom_data['additional_data'] as $additional_data ): ?>

						<li>
							<div class="about-desc">
								<?php echo $additional_data['text']; ?>
							</div>
						</li>
						
					<?php endforeach; endif; ?>

	        
	      </ul>
	    </div>
	  </div>
	</div>
</section>