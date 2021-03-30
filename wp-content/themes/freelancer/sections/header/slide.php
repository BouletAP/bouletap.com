<?php
    $data = get_fields(get_the_ID());
?>
<!-- Item 1 -->
<div class="item">
    <div class="overlay-slider"></div>
    <img src="<?php echo wp_get_attachment_url($data['background_image']); ?>" alt="<?php the_title(); ?>">
    <div class="slider-text-section">
    <div class="container">
        <div class="slider-text">
            <div class="slider-title to-animate"><h1><?php the_title(); ?></h1></div>
            <div class="to-animate"><?php the_content(); ?></div>
            
            <?php if( !empty($data['links']) ): ?>
                <div class="list-btn to-animate">
                    <?php foreach($data['links'] as $link): ?>
                        <a href="<?php echo $link['link'];?>" class="btns" title="<?php echo $link['title'];?>"><?php echo $link['title'];?><span><i class="fa fa-long-arrow-right"></i></span></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</div>