<?php
    $form = $data['publication_form'];
?>
<title>Admin Articles André-Philippe Boulet</title>  
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
                    <h1>Entrer un nouvel article</h1>

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-error-message hide"><span class="error-title">Le formulaire est invalide :</span></div>
                        <div><?php echo $form->getField('title')->display(); ?></div>
                        <div>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div><?php echo $form->getField('content')->display(); ?></div>

                        <button type="submit" class="btn-cta" id="btn-contact-submit">Envoyer mon message <i class="lni lni-arrow-right"></i></span></button>
                    </form>      
                </div>
            </div>


        </section>
       

    </div>      


