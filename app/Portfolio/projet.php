<?php
    $projet = $data['projet'];
?>
<link rel="stylesheet" href="/medias/css/portfolio.css" />       
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
                <p><a href="<?php echo $projet->url; ?>" target="_blank"><?php echo $projet->url; ?></a></p>      
            </div>

        </section>
        
        <section class="section-preview">
            <img src="<?php echo $projet->image_hero; ?>" alt="<?php echo $projet->title; ?>">   
            <div>
                <div class="concept">
                    <span>&#9655; Concept</span>
                    <p><?php echo $projet->concept; ?></p>
                </div>
                <div class="concept">
                    <span>&#9655; Défi</span>
                    <p><?php echo $projet->defi; ?></p>
                </div>
                <div class="concept">
                    <span>&#9655; Solution</span>
                    <p><?php echo $projet->solution; ?></p>
                </div>
            </div>
        </section>

        <section class="section-details">

            <div class="overview">
                <span>project overview</span>
                <p><?php echo $projet->overview; ?></p>
            </div>


            <div class="slider">
            <div class="slide">
                    <div>
                        <img src="<?php echo $projet->overview_1['image']; ?>" alt="<?php echo $projet->overview_1['desc']; ?>" />                    
                    </div>
                    <p class="desc"><?php echo $projet->overview_1['desc']; ?></p>
                </div>
                <div class="slide">
                    <div>
                        <img src="<?php echo $projet->overview_2['image']; ?>" alt="<?php echo $projet->overview_2['desc']; ?>" />                    
                    </div>
                    <p class="desc"><?php echo $projet->overview_2['desc']; ?></p>
                </div>
                <div class="slide">
                    <div>
                        <img src="<?php echo $projet->overview_3['image']; ?>" alt="<?php echo $projet->overview_3['desc']; ?>" />                    
                    </div>
                    <p class="desc"><?php echo $projet->overview_3['desc']; ?></p>
                </div>
            </div>


            <div class="project-details">
                
                <div class="details">
                    <span class="subtitle"><?php echo $projet->title; ?></span>
                    <h3><?php echo $projet->short_pitch; ?></h3>
                    <p><?php echo $projet->sales_pitch; ?></p>
                </div>

                <ul>
                    <li>
                        <span class="title">Date de publication</span>
                        <?php echo $projet->date_publication; ?>
                    </li>
                    <li>
                        <span class="title">Type de projet</span>
                        <?php echo $projet->type_projet; ?>
                    </li>
                    <li>
                        <span class="title">Client</span>
                        <?php echo $projet->nom_client; ?>
                    </li>
                </ul>
            </div>
        </section>

        <a href="/portfolio" class="btn-retour"><i class="lni lni-arrow-left"></i> Retour à la liste de projets</a>

    </div>      






    