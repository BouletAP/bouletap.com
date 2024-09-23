<?php
    $form = $data['portfolio_form'];
?>
<title>Ajouter un projet André-Philippe Boulet</title>  
<link rel="stylesheet" href="/medias/css/admin.css" />    


<script>
    // PUSH INTO FORM OBSERVER / DECORATOR?
    // ajax pour delete
    // ajax pour upload d'une image (fresh id how?)
    function bouletap_killImage(input_name) {
        if( confirm('Êtes-vous sur de vouloir remplacer l\'image ?') ) {
            var parent = document.querySelector('input[name="'+input_name+'"]').closest('.image-preview');            

            var current_image = document.querySelector('input[name="'+input_name+'"]').value;

            var new_file_input = document.createElement('input');
            new_file_input.setAttribute('type', 'file');
            new_file_input.setAttribute('name', input_name);

            // creer un hidden_field old_image pour la suppression
            var input_to_delete = document.createElement('input');
            input_to_delete.setAttribute('type', 'hidden');
            input_to_delete.setAttribute('name', input_name + "_delete_pending");     
            input_to_delete.setAttribute('value', current_image);     

            parent.after(new_file_input);
            parent.after(input_to_delete);            
            parent.remove();
        }
    }
</script>



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
                        <div class="flex-images">
                            <div class="col-3">
                                <?php echo $form->getField('images_1')->display(); ?>
                                <?php echo $form->getField('images_1_desc')->display(); ?>
                            </div>
                            <div class="col-3">
                                <?php echo $form->getField('images_2')->display(); ?>
                                <?php echo $form->getField('images_2_desc')->display(); ?>
                            </div>
                            <div class="col-3">
                                <?php echo $form->getField('images_3')->display(); ?>
                                <?php echo $form->getField('images_3_desc')->display(); ?>
                            </div>
                        </div>
                        
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


