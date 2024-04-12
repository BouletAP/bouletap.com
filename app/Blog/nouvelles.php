

<link rel="stylesheet" href="/medias/css/blog.css" />       
    <title>Toutes les nouvelles - André-Philippe Boulet</title> 
</head>
<body class="page-nouvelles page-content">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="section-description">
                <span class="subtitle">Publications</span>
                <h2>À la une</h2>     
                <p>Consultez les nouvelles ou les articles écrient par André-Philippe dernièrement</p>           
            </div>

        </section>

        <div class="content-with-sidebar">

            <div class="content">
                <section class="section-nouvelles">
                    
                    
                    <div class="preview-nouvelles">

                        <?php foreach($data['nouvelles'] as $nouvelle): ?>
                            <div class="card card-nouvelle">
                                <div class="img">
                                    <a href="/nouvelle/<?php echo $nouvelle->slug; ?>"><img src="<?php echo $nouvelle->preview_image; ?>" alt="<?php echo $nouvelle->title; ?>"></a>
                                    <a href="" class="categories"><?php echo $nouvelle->categorie; ?></a>
                                </div>
                                <h3><?php echo $nouvelle->title; ?></h3>
                                <p><?php echo $nouvelle->preview_desc; ?></p>
                                <a href="/nouvelle/<?php echo $nouvelle->slug; ?>" class="read-more">Lire la suite »</a>

                                <div class="card-footer">
                                    <a class="date" href="/nouvelles"><?php echo $nouvelle->date; ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </section>
            </div>

            <div class="sidebar">
                <h3>Trouver une nouvelle</h3>
                <hr>
                <div class="sidebar-content">
                    <div class="bloc search-form">
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
                            <li><a href="#">Nouvelles</a></li>
                            <li><a href="#">Cheatsheet</a></li>
                            <li><a href="#">Trucs et astuces</a></li>
                        </ul>
                    </div>
                    <div class="bloc">
                        <h4>Archives</h4>
                        <ul>
                            <li><a href="#">Avril 2024</a></li>
                            <li><a href="#">Mars 2024</a></li>
                            <li><a href="#">Février 2024</a></li>
                            <li><a href="#">Janvier 2024</a></li>
                            <li><a href="#">2023</a></li>
                            <li><a href="#">2020-2022</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>      






    