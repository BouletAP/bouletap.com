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
                <span class="subtitle">Projets réalisés par André-Philippe Boulet</span>
                <h2>Portfolio de projets</h2>               
            </div>

        </section>

        <div class="content-with-sidebar">

            <div class="content">
                <section class="section-nouvelles">
                    
                    
                    <div class="preview-nouvelles">

                        <?php foreach($data['projets'] as $projet): ?>
                            <div class="card card-nouvelle">
                                <div class="img">
                                    <a href="/portfolio/<?php echo $projet->slug; ?>"><img src="<?php echo $projet->preview_image; ?>" alt="<?php echo $projet->title; ?>"></a>
                                    <a href="#" class="categories"><?php echo $projet->categorie; ?></a>
                                </div>
                                <h3><a href="/portfolio/<?php echo $projet->slug; ?>"><?php echo $projet->title; ?></a></h3>
                                <p><?php echo $projet->preview_desc; ?></p>
                                <a href="/portfolio/<?php echo $projet->slug; ?>" class="read-more">Lire la suite »</a>

                                <div class="card-footer">
                                    <a class="date" href="#"><?php echo $projet->date; ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </section>
            </div>

            <div class="sidebar">
                <h3>Sidebar title</h3>
                <div class="bloc">
                    <h4>Bloc title</h4>
                </div>

            </div>

        </div>

    </div>      






    