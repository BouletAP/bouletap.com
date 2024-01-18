<?php
    require_once APP_PATH . '/models/forms/contact.php';
    $contact_form = new Models\Forms\ContactForm();
?>

<link rel="stylesheet" href="medias/css/pages/contact.css" />       
    <title>Contact - André-Philippe Boulet</title> 
</head>
<body class="page-nouvelles page-content">
    <div class="header-container">        
        <?php include('template-parts/layouts/header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="page-header">
                <span class="subtitle">Nous Joindre</span>
                <h2>Contact</h2>     
                <p>Plusieurs moyens de contact sont disponibles pour joindre André-Philippe Boulet</p>           
            </div>

        </section>

        <section class="section-form" id="section-contact-form">

            <div class="contact-description">

                <h2>Besoin d'aide ?</h2>
                <p>Si vous avez besoin d'aide avec votre site Internet, vous pouvez ouvrir un ticket avec nous, il nous fera plaisir de vous assister. Choisissez une catégorie ci-dessous et nous vous reviendrons dès que possible.</p>

                <ul>
                    <li>Question ou commentaire générale</li>    
                    <li>Nouveau site Internet</li>
                    <li>Ajouts à mon site existant</li>
                    <li>Correctifs à mon site existant</li>
                    <li>Vérification de la qualité de mon site</li>
                    <li>Problème avec mon commerce électronique</li>
                    <li>Question sur la facturation</li>
                </ul>
            </div>


            <div class="form-contact">
                
                <form id="form-contact" class="form-underlined form-state-error" onsubmit="return false;" method="post" enctype="multipart/form-data">
                    <div class="form-error-message hide"><span class="error-title">Le formulaire est invalide :</span></div>
                    <?php echo $contact_form->getField('courriel')->display(); ?>
                    <div class="form-col2">
                        <?php echo $contact_form->getField('full_name')->display(); ?>
                        <?php echo $contact_form->getField('phone')->display(); ?>
                    </div>
                    <?php echo $contact_form->getField('subject')->display(); ?>
                    <?php echo $contact_form->getField('message')->display(); ?>

                    <button type="submit" class="btn-cta" id="btn-contact-submit">Envoyer mon message <i class="lni lni-arrow-right"></i></span></button>

                </form>               

            </div>
        </section>


        <section class="contact-methodes">
            <div class="rendez-vous">
                <span class="subtitle">VOS PROJETS NOUS INTÉRESSENT!</span>
                <h2>Discutons ensemble de vos projets</h2>
                <p>Nous avons à cœur le respect de vos valeurs et de votre unicité. Notre équipe est 100% en télétravail, ce qui nous permet de répondre à vos besoins partout au Québec. Nous ferons en sorte de satisfaire vos exigences, tout en repoussant constamment les limites de notre créativité!</p>
                <div class="methode">
                    <i class="lni lni-timer"></i>
                    <h3>Heures de disponibilité</h3>
                    <p>
                        Lundi et Vendredi<br />
                        9.00AM - 11.30AM<br /><br />
                        Mardi au Jeudi<br />
                        9.00AM - 15.00PM<br /><br />
                        Samedi et Dimanche<br />
                        Fermé
                    </p>
                </div>
            </div>
            <div class="methodes">
                <div class="methode">
                    <i class="lni lni-inbox"></i>
                    <h3>Par courriel</h3>
                    <p><a href="#contact-form">apb@bouletap.com</a></p>
                </div>
                <div class="methode">
                    <i class="lni lni-map-marker"></i>
                    <h3>Par la poste</h3>
                    <p>196 rue du Richelieu, Dunham, J0E 1M0</p>
                </div>
                <div class="methode">
                    <i class="lni lni-phone-set"></i>
                    <h3>Par téléphone</h3>
                    <p>Notre numéro personnel n'est plus publiquement disponible</p>
                </div>             
            </div>
        </section>

    </div>      
    
<script>        
    var submit = document.querySelector("#btn-contact-submit");
    submit.addEventListener("click", () => {
        var form = document.querySelector('#form-contact');
        BouletAPForms.submit(form);
    });
</script>