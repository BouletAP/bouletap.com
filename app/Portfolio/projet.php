<?php
    $projet = $data['projet'];
?>
<link rel="stylesheet" href="/medias/css/portfolio.css" />       
    <title>Portfolio de projets - André-Philippe Boulet</title> 
</head>
<body class="page-nouvelles page-projet">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="section-description">
                <span class="subtitle">Projet réalisé par André-Philippe Boulet</span>
                <h1><?php echo $projet->title; ?></h1>  
                
                <?php if($projet->site_mort): ?>
                    <p class="site-mort"><a href="javascript:;" target="_blank"><del><?php echo $projet->url; ?></del></a> (supprimé)</p>     
                <?php else: ?>
                    <p><a href="<?php echo $projet->url; ?>" target="_blank"><?php echo $projet->url; ?></a></p>     
                <?php endif; ?> 
            </div>

        </section>
        
        <section class="section-preview">
            <img src="/uploads/<?php echo $projet->image; ?>" alt="<?php echo $projet->title; ?>">   
            <div>
                <?php if( !empty($projet->concept) ): ?>
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
                <?php else: ?>
                    <div class="concept">
                        <span>&#9655; Project overview</span>
                        <p><?php echo $projet->overview; ?></p>
                    </div>
                    <div class="concept">
                        <span>&#9655; Défi</span>
                        <p class="markdown"><?php echo $projet->defi; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="section-details">

            <?php if( !empty($projet->concept) ): ?>
                <div class="overview">
                    <span>project overview</span>
                    <p><?php echo nl2br($projet->overview); ?></p>
                </div>
            <?php endif; ?>

            <?php if(!empty($projet->images_1)): ?>
            <div class="slider">
                    <div class="slide">
                        <div>
                            <a href="javascript:;"><img src="/uploads/<?php echo $projet->images_1; ?>" alt="<?php echo $projet->images_1_desc; ?>" /></a>                    
                        </div>
                        <p class="desc"><?php echo $projet->images_1_desc; ?></p>
                    </div>
                <?php if(!empty($projet->images_2)): ?>
                    <div class="slide">
                        <div>
                        <a href="javascript:;"><img src="/uploads/<?php echo $projet->images_2; ?>" alt="<?php echo $projet->images_2_desc; ?>" /></a>                    
                        </div>
                        <p class="desc"><?php echo $projet->images_2_desc; ?></p>
                    </div>
                <?php endif; ?>
                <?php if(!empty($projet->images_3)): ?>
                    <div class="slide">
                        <div>
                        <a href="javascript:;"><img src="/uploads/<?php echo $projet->images_3; ?>" alt="<?php echo $projet->images_3_desc; ?>" /></a>                    
                        </div>
                        <p class="desc"><?php echo $projet->images_3_desc; ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>


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

        <a href="/portfolio/" class="btn-retour"><i class="lni lni-arrow-left"></i> Retour à la liste de projets</a>

    </div>      


<script>
    var images = document.querySelectorAll('.slider .slide');

    images.forEach((image, index) => {
        image.addEventListener('click', () => {
            var src = image.querySelector('img').src;
            showModal(src);
        })
    });

    function showModal(src) {
        var modalProjectBg = document.createElement("div");
        modalProjectBg.classList.add('modal-ap-bg');
        document.querySelector('body').prepend(modalProjectBg);

        

        var modalProject = document.createElement("div");     
        var modalImage = document.createElement("img");   
        modalProject.classList.add('modal-ap');           
        modalImage.setAttribute('src', src);
        modalProject.append(modalImage);
        document.querySelector('body').prepend(modalProject);
        modalProject.classList.add('active');     

        modalProjectBg.addEventListener('click', function(e) {
            killModal();
        });
        modalProject.addEventListener('click', function(e) {
            e.stopPropagation();
        });     
    }

    function killModal() {
        document.querySelector('.modal-ap-bg').remove(); 
        document.querySelector('.modal-ap').remove(); 
    }
</script>



    