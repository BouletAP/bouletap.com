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
                <h3>Trouver un projet</h3>
                <hr>
                <div class="sidebar-content">
                    <div class="bloc search-form hide">
                        <h4>Par mot-clé</h4>
                        <form action="/" class="form-underlined" method="post" enctype="multipart/form-data">
                            <div class="form-col2">
                                <input type="text" placeholder="Entrez un mot-clé...">
                                <button type="submit"><i class="lni lni-arrow-right"></i></span></button>
                            </div>                    
                            
                        </form>
                    </div>
                    <div class="bloc">
                        <h4>Par catégories</h4>
                        <ul>
                        <?php foreach($data['categories'] as $slug => $name): ?>
                            <li><a href="/<?php echo $slug; ?>"><?php echo $name; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="bloc hide">
                        <h4>Archives</h4>
                        <ul>
                            <li><a href="#">2024</a></li>
                            <li><a href="#">2023</a></li>
                            <li><a href="#">2020-2022</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>      






    