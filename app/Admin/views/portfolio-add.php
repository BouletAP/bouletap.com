<?php
    $form = $data['portfolio_form'];
?>
<title>Ajouter un projet André-Philippe Boulet</title>  
<link rel="stylesheet" href="/medias/css/admin.css" />    

</head>

<body class="home">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="page-header">
                <span class="subtitle">Administration</span>
                <h1>Taleau de bord administrateur</h1>       
                
            </div>

        </section>


        <section class="dashboard-content">
            <div class="sidebar">
                <?php include(APP_PATH.'/Admin/views/_menu.php'); ?>

                <h3></h3>
            </div>
            <div class="page-admin">
                
                <div>
                    <h1>Entrer de nouveau projet</h1>

                    <form method="post" enctype="multipart/form-data">
                        
                        <?php if($form->hasErrors()): ?>
                            <div class="form-error-message"><span class="error-title">Le formulaire est invalide.</span></div>
                        <?php endif; ?>

                        <div>
                            <span>Image principale + featured</span>
                            <?php echo $form->getField('image')->display(); ?>
                        </div>

                        <div><?php echo $form->getField('title')->display(); ?></div>
                        <div><?php echo $form->getField('url')->display(); ?></div>
                        
                        <div><?php echo $form->getField('concept')->display(); ?></div>
                        <div><?php echo $form->getField('defi')->display(); ?></div>
                        <div><?php echo $form->getField('solution')->display(); ?></div>
                        
                        <div><?php echo $form->getField('overview')->display(); ?></div>
                        
                        <div><?php echo $form->getField('short_pitch')->display(); ?></div>
                        <div><?php echo $form->getField('sales_pitch')->display(); ?></div>
                        
                        <div><?php echo $form->getField('date_publication')->display(); ?></div>
                        <div><?php echo $form->getField('type_projet')->display(); ?></div>
                        <div><?php echo $form->getField('nom_client')->display(); ?></div>

                        <button type="submit" class="btn-cta" id="btn-contact-submit">Envoyer mon message <i class="lni lni-arrow-right"></i></span></button>
                    </form>      
                </div>
            </div>


        </section>
       

    </div>      


