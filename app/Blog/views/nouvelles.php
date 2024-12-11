

<link rel="stylesheet" href="/medias/css/blog.css" />       
    <title>Toutes les nouvelles - André-Philippe Boulet</title> 
</head>
<body class="page-nouvelles">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="section-description">
                <span class="subtitle">Publications</span>
                <h2>À la une</h2>     
                <p>Consultez les nouvelles ou les articles écrit par André-Philippe dernièrement</p>           
            </div>

        </section>

        <div class="content-with-sidebar">

            <div class="content">
                <section class="section-nouvelles">
                    
                    
                    <div class="preview-nouvelles">

                        <?php foreach($data['nouvelles'] as $nouvelle): ?>
                            <div class="card card-nouvelle">
                                <div class="img">
                                    <a href="/nouvelle/<?php echo $nouvelle->slug; ?>">
                                        <?php if( !empty($nouvelle->image) ): ?>
                                            <img src="/uploads/<?php echo $nouvelle->image; ?>" alt="<?php echo $nouvelle->title; ?>" loading="lazy">
                                        <?php else: ?>
                                            <img src="/medias/images/placeholder-default.png" alt="<?php echo $nouvelle->title; ?>" loading="lazy">
                                        <?php endif; ?>
                                    </a>
                                    <a href="javascript:;" class="categories"><?php echo $nouvelle->categories; ?></a>
                                </div>
                                <h3><a href="/nouvelle/<?php echo $nouvelle->slug; ?>"><?php echo $nouvelle->title; ?></a></h3>
                                <p><?php echo $nouvelle->short_pitch; ?></p>
                                <a href="/nouvelle/<?php echo $nouvelle->slug; ?>" class="read-more">Lire la suite »</a>

                                <div class="card-footer">
                                    <a class="date" href="/nouvelles"><?php echo $nouvelle->published; ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <?php if($data['show_pagination']): ?>
                            <div class="pagination">
                                <span class="subtitle"><?php echo $data['total_posts']; ?> nouvelles disponibles</span>
                                <ul>
                                    <?php for($i = 1; $i <= $data['total_pages']; $i++): ?>
                                        <li class="<?php echo $i == $data['page'] ? 'active' : ''; ?>">
                                            <a href="/nouvelles/<?php echo $data['selected_category']; ?>/<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>                                    
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <?php if( empty($data['nouvelles']) ): ?>
                            <p>Nous n'avons publié aucun article dans cette catégorie</p>
                        <?php endif; ?>

                    </div>
                </section>
            </div>

            <div class="sidebar">            
                <?php include(APP_PATH.'/Blog/_sidebar.php'); ?>
            </div>

        </div>

    </div>      