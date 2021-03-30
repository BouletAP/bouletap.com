
<!-- Blog Post -->
<div class="small-post">


    <ul class="post-list">      
    <?php if(have_posts()): while(have_posts()): the_post(); $acfData = get_fields(get_the_ID()); ?>
        <?php 
            $projectTags = extractProjectTerms(get_the_ID());
            $projectTag = $projectTags[0]->name;
        ?>
        <li class="post-listing"> 
            <!-- Blog Post 1-->
            <div class="blog-post-image">
                <?php if( !empty($acfData['image_main']) ): ?>
                    <img src="<?php echo wp_get_attachment_url($acfData['image_main']); ?>" alt="<?php echo $acfData['displayed_title']; ?>" />
                <?php else: ?> 
                    <img src="<?php echo get_template_directory_uri() . '/medias/images/blog/blog-1.jpg' ?>" alt="Blog">
                <?php endif; ?>
                <div class="b-wrapper">
                    <div class="socialnetworks blog-social-icon hide">
                        <ul>
                            <li><a href="javascript:void(0);" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0);" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="b-top-line"></div>
            </div>
            <div class="blog-content blog-content-style-2">
                <div class="post-border"></div>
                <h2 class="small-title"><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo $acfData['displayed_title']; ?></a></h2>
                <ul class="blog-post-action">
                    <li><a href="javascript:void(0);"><i class="fa fa-user"></i> <?php echo $projectTag; ?></a></li>
                </ul>
                <?php if( !empty($acfData['project_vision']) ): ?>
                    <p><?php echo substr($acfData['project_vision'], 0, 120); ?></p>
                <?php endif; ?>
            
            </div>
        </li>
        
    <?php endwhile; endif; $acfData = null; ?>
    </ul>
</div>
<!-- Blog Post End --> 