

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
                                    <a href=""><img src="<?php echo $nouvelle->preview_image; ?>" alt="<?php echo $nouvelle->title; ?>"></a>
                                    <a href="" class="categories"><?php echo $nouvelle->categorie; ?></a>
                                </div>
                                <h3><?php echo $nouvelle->title; ?></h3>
                                <p><?php echo $nouvelle->preview_desc; ?></p>
                                <a href="/" class="read-more">Lire la suite »</a>

                                <div class="card-footer">
                                    <a class="date" href="/nouvelles"><?php echo $nouvelle->date; ?></a>
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






    