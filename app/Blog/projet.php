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
                <p></p>            
            </div>

        </section>
        
        <section>
            <div>
                <img src="<?php echo $projet->preview_image; ?>" alt="<?php echo $projet->title; ?>">
            </div>
            <div>
                <h1><?php echo $projet->title; ?></h1>
                <p><?php echo $projet->preview_desc; ?></p>
            </div>
        </section>

    </div>      






    