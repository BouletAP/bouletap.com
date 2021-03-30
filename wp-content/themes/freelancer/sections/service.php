<?php
    $data = get_fields(get_the_ID());
?>
<!-- Service 1 -->
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 services-all">
    <div class="service-box">
        <div class="services-icon"><i class="fa <?php echo $data['icon']; ?>"></i></div>
        <div class="small-title"><?php the_title(); ?></div>
        <p><?php echo $data['pitch']; ?></p>
        <!-- Services Overlay Effect -->
        <div class="overlay">
        <div class="small-title small-title-hover"><?php the_title(); ?></div>
        <?php echo $data['worklist']; ?>
    </div>
    <!-- Services Overlay Effect End --> 
    <img alt="Blank placeholder" src="<?php echo get_template_directory_uri() . '/medias/images/blank.png' ?>" class="blank"> 
    </div>
</div>