<script>
    jQuery(document).ready(function() {
        jQuery('.main-menu .menu-toggle').on('click', function() {
            var mainMenu = jQuery(this).parents('.main-menu');
            mainMenu.toggleClass('is-open');
            mainMenu.parents('#main-header').toggleClass('menu-opened');
        }); 
    });
</script>
<!-- Header Start-->
<header id="main-header">
  <div class="container-fluid">
            
        <div class="main-menu">
            
            <div class="menu-presentation">
                
                <a href="javascript:;" class="menu-toggle">
                    <i class="icon-toopen fa fa-bars"></i>
                    <i class="icon-toclose fa fa fa-times"></i>            
                </a>
                
                <div class="company-logo header">            	
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo("name"); ?>" class="logo">
                        <img src="/wp-content/uploads/logo.png" alt="<?php bloginfo("name"); ?>">
                        <?php _e("BouletAP Software", "bouletap"); ?>
                    </a>
                    <a href="<?php echo home_url(); ?>" class="home-span"><?php _e("Home", "bouletap"); ?></a>
                    <a href="<?php echo home_url(); ?>" class="home-icon"><i class="fas fa-home"></i></a>
                </div>

                <div class="lang-container">
                    <div class="socialnetworks">
                    <ul class="pull-right">
                        <li class="li-phone"><a href="tel://4507752905" title="Phone"><span class="fa-icon"><i class="fa fa-phone"></i></span>450-775-2905</a></li>
                        <li class="li-social"><a href="/contact/" title="Urgences"><span class="fa-icon"><i class="fas fa-envelope"></i></span></a></li>
                        <!--<li class="li-social"><a href="#" title="User Login"><i class="fa fa-user"></i></a></li>-->
                        <li class="language-switcher"><?php do_action('icl_language_selector'); ?></li>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="menu-container">
                <ul class="interactive-menu is-open">
                    <li><a href="<?php echo get_permalink(712); ?>">
                        <object class="svgicons" data="<?php echo get_stylesheet_directory_uri(); ?>/medias/svg/021-mind.svg" type="image/svg+xml"></object> 
                        <?php _e("About BouletAP", "bouletap"); ?>
                    </a></li>
                    <li><a href="/projects/">
                        <object class="svgicons" data="<?php echo get_stylesheet_directory_uri(); ?>/medias/svg/049-stars.svg" type="image/svg+xml"></object> 
                        <?php _e("Our projects", "bouletap"); ?>
                    </a></li>
                    <li><a href="<?php echo get_permalink(710); ?>">
                        <object class="svgicons" data="<?php echo get_stylesheet_directory_uri(); ?>/medias/svg/022-keyboard.svg" type="image/svg+xml"></object> 
                        <?php _e("What We Do For You", "bouletap"); ?>
                    </a></li>
                    <li><a href="<?php echo get_permalink(593); ?>">
                        <object class="svgicons" data="<?php echo get_stylesheet_directory_uri(); ?>/medias/svg/008-award.svg" type="image/svg+xml"></object> 
                        <?php _e("The BouletAP Way", "bouletap"); ?>
                    </a></li>
                    <li><a href="/nouvelles/">
                        <object class="svgicons" data="<?php echo get_stylesheet_directory_uri(); ?>/medias/svg/001-browser.svg" type="image/svg+xml"></object> 
                        <?php _e("Notes & News", "bouletap"); ?>
                    </a></li>
                    <li><a href="<?php echo get_permalink(706); ?>">
                        <object class="svgicons" data="<?php echo get_stylesheet_directory_uri(); ?>/medias/svg/085-call.svg" type="image/svg+xml"></object>
                        <?php _e("Contact Us", "bouletap"); ?>
                    </a></li>
                </ul>
            </div>

        </div>
  </div>    
</header>