<?php
    $nouvelle = $data['nouvelle'];
?>
<link rel="stylesheet" href="/medias/css/blog.css" />       
    <title><?php echo $nouvelle->title; ?></title> 

    <style>
        .section-description {
            background-image: url('/uploads/<?php echo $nouvelle->image; ?>');
        }
    </style>
</head>
<body class="page-nouvelles page-content details-nouvelle">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="section-description">
                <span class="subtitle">Publications</span>
                <h1><?php echo $nouvelle->title; ?></h1>     
                <p><?php echo $nouvelle->short_pitch; ?></p>        
                <a href="/nouvelles" class="breadcrumb"><i class="lni lni-arrow-left"></i> Retour aux nouvelles</a>   
            </div>

        </section>

        <div class="content-with-sidebar">

            <div class="content">
                <section class="article-content">
                
                <?php echo $nouvelle->content; ?>
                
                </section>

                <div class="author-box">
                    <img src="/medias/images/andre-philippe-boulet-2017.jpeg" alt="André-Philippe Boulet">
                    <p><span>André-Philippe Boulet</span>André-Philippe Boulet est un développpeur chaleureux, acharné et passionné qui souhaite aider votre entreprise à atteindre ses objectifs. Par une approche humaine et compréhensible, il utilise les technologies de l’information pour convertir vos besoins d’affaires en résultats.</p>
                </div>
                
            </div>

            <div class="sidebar">
                <?php include(APP_PATH.'/Blog/_sidebar.php'); ?>
            </div>

        </div>

    </div>      






    