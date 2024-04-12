<?php
    $projet = $data['projet'];
?>
<link rel="stylesheet" href="/medias/css/blog.css" />       
    <title>Portfolio de projets - André-Philippe Boulet</title> 
</head>
<body class="page-nouvelles page-content">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="section-description">
                <span class="subtitle">Projet réalisé par André-Philippe Boulet</span>
                <h1><?php echo $projet->title; ?></h1>    
                <p><a href="https://donaldroyerdesign.com/" target="_blank">https://donaldroyerdesign.com/</a></p>      
            </div>

        </section>
        
        <section class="section-preview">
            <img src="<?php echo $projet->preview_image; ?>" alt="<?php echo $projet->title; ?>">   
            <div>
                <div class="concept">
                    <span>&#9655; Concept</span>
                    <p>Lorem ipsum dolor sit amet cotetur adipisicing elit, sed do mod tempor incid idunt u emu sompor incididunt ut labore etdolore emu some the and one tempor</p>
                </div>
                <div class="concept">
                    <span>&#9655; Défi</span>
                    <p>Lorem ipsum dolor sit amet cotetur adipisicing elit, sed do mod tempor incid idunt u emu sompor incididunt ut labore etdolore emu some the and one tempor</p>
                </div>
                <div class="concept">
                    <span>&#9655; Solution</span>
                    <p>Lorem ipsum dolor sit amet cotetur adipisicing elit, sed do mod tempor incid idunt u emu sompor incididunt ut labore etdolore emu some the and one tempor</p>
                </div>
            </div>
        </section>

        <section class="section-details">

            <div class="overview">
                <span>project overview</span>
                <p>Perferendis repudiandae fugia rchitecto beatae reprederit vitae recus andae debitis facere quidem animi placeat delt maxime cuuntur at volup tatib uod numuam pariatur libero laborum laudantium non. Vitae optio, distinctio earum esse corporis dolorem! arerse. Excepturi quos conse ctetur adipi sicing elit provi dent laud atium voluptas officiis minus rer um aliquid volup tatem ullam beatae nulla amet facere cum que provident.Radiant Studios stands as a distinguished and reputable label, celebrated for its premium offerings that showcase innovation, creativity.</p>
            </div>


            <div class="slider">
            <div class="slide">
                    <div>
                        <img src="/medias/images/portfolio/donaldroryerdesign.com/preview-free-quote.JPG" alt="" />                    
                    </div>
                    <p class="desc">Formulaire personnalisée de demande de soumission</p>
                </div>
                <div class="slide">
                    <div>
                        <img src="/medias/images/portfolio/donaldroryerdesign.com/portfolio-filters.JPG" alt="" />                    
                    </div>
                    <p class="desc">Présentation du portfolio avec filtrage par type de service</p>
                </div>
                <div class="slide">
                    <div>
                        <img src="/medias/images/portfolio/donaldroryerdesign.com/contact-page.JPG" alt="" />                    
                    </div>
                    <p class="desc">Page contact simple et adaptée à tous les écrans</p>
                </div>
            </div>


            <div class="project-details">
                
                <div class="details">
                    <span class="subtitle"><?php echo $projet->title; ?></span>
                    <h3>Designer expérimenté pour vos logos ou projets artistiques</h3>
                    <p>Perferendis repudiandae fugia rchitecto beatae reprederit vitae recus andae debitis facere quidem animi placeat delt maxime cuuntur at volup tatib uod numuam pariatur libero laborum laudantium non. Vitae optio, distinctio earum esse corporis dolorem! arerse. Excepturi quos conse ctetur adipi sicing elit provi dent laud atium voluptas officiis minus rer um aliquid volup tatem ullam beatae nulla amet facere cum que provident.Radiant Studios stands as a distinguished and reputable label, celebrated for its premium offerings that showcase innovation, creativit. Vitae optio, distinctio earum esse corporis dolorem! arerse.</p>
                </div>

                <ul>
                    <li>
                        <span class="title">Date de publication</span>
                        Décembre 2020
                    </li>
                    <li>
                        <span class="title">Type de projet</span>
                        Portfolio de projets
                    </li>
                    <li>
                        <span class="title">Client</span>
                        Donald Royer Design
                    </li>
                </ul>
            </div>
        </section>


    </div>      






    