<div class="waves waves-blue">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
        <path class="color-primary" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
        <path class="color-primary" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
        <path class="color-primary" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
    </svg>
</div>
<div id="main-header">
        
    <div class="main-menu" id="mainMenuContainer">
        
        <div class="menu-presentation">
            
            <a href="javascript:;" class="menu-toggle" id="btnMainMenuToggle">
                <i class="icon-toopen lni lni-menu"></i>
                <i class="icon-toclose lni lni-close"></i>        
            </a>
            
            <div class="company-logo header">            	
                <a href="/" title="André-Philippe Boulet" class="logo">
                    <img decoding="async" src="/medias/images/logo.png" alt="André-Philippe Boulet">
                    André-P. Boulet                    </a>
                <a href="/" class="home-span">Accueil</a>
                <a href="/" class="home-icon"><i class="fas fa-home"></i></a>
            </div>

            <div class="lang-container">
                <div class="socialnetworks">
                    <ul class="pull-right">
                        <li class="li-phone"><a href="/contact" title="Phone"><i class="lni lni-popup"></i></span> Contact</a></li>
                        <!--<li class="li-social"><a href="#" title="User Login"><i class="fa fa-user"></i></a></li>-->
                        <li class="language-switcher"></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="menu-container">
            <ul class="interactive-menu is-open">
                <li>
                    <a href="/a-propos/" class="menu-about">
                        <span id="menu-about-svg"></span>
                        <span>Qui est AP ?</span>
                    </a>
                </li>
                <li>
                    <a href="/portfolio" class="menu-portfolio">
                        <span id="menu-portfolio-svg"></span>   
                        <span>Portfolio</span>                   
                    </a>
                </li>
                <li>
                    <a href="/services/creation-site-internet" class="menu-services">
                        <span id="menu-services-svg"></span>                       
                        <span>Services offerts</span>                   
                    </a>
                </li>
                <li>
                    <a href="/carre-de-sable-interactif" class="menu-vitrine">
                        <span id="menu-vitrine-svg"></span>   
                        <span>Vitrine interactive</span>                  
                    </a>
                </li>
                <li>
                    <a href="/nouvelles" class="menu-nouvelles">
                        <span id="menu-nouvelles-svg"></span>  
                        <span>Notes &amp; Nouvelles</span>                    
                    </a>
                </li>
                <li>
                    <a href="/contact/" class="menu-contact">
                        <span id="menu-contact-svg"></span> 
                        <span>Contacter AP </span>                   
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>    
<script>
    document.addEventListener("DOMContentLoaded", function() {
        loadCustomSVG('menu-about');
        loadCustomSVG('menu-portfolio');
        loadCustomSVG('menu-services');
        loadCustomSVG('menu-vitrine');
        loadCustomSVG('menu-nouvelles');
        loadCustomSVG('menu-contact');
    });    
</script>