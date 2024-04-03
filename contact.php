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
                    <li onclick="focusContactForm(this)">Question ou commentaire général</li>    
                    <li onclick="focusContactForm(this)">Nouveau site Internet</li>
                    <li onclick="focusContactForm(this)">Ajouts à mon site existant</li>
                    <li onclick="focusContactForm(this)">Correctifs à mon site existant</li>
                    <li onclick="focusContactForm(this)">Vérification de la qualité de mon site</li>
                    <li onclick="focusContactForm(this)">Problème avec mon commerce électronique</li>
                    <li onclick="focusContactForm(this)">Question sur une facture</li>
                </ul>
            </div>


            <div class="form-contact">
                
                <form id="form-contact" class="form-underlined" onsubmit="return false;" method="post" enctype="multipart/form-data">
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
                <p>Nous avons à cœur le respect de vos valeurs et de votre identité. Notre équipe est 100% en télétravail, ce qui nous permet de répondre rapidement à vos besoins peu importe où votre entreprise est située. Parlez-nous des exigences de vos projets et nous ferons en sorte de convertir les technologies de l'information en résultats !</p>
                
                <div class="methodes">
                    <div class="methode">
                        <i class="lni lni-inbox"></i>
                        <h3>Par courriel</h3>
                        <p><a href="#contact-form">apb@bouletap.com</a></p>
                    </div>
                    <div class="methode">
                        <i class="lni lni-link"></i>
                        <h3>Sur le web</h3>
                        <div class="socials">
                            <ul>
                                <li><a href="https://www.facebook.com/logicielsbouletap/" title="Facebook link" target="_blank" rel="nofollow"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/andr%C3%A9-philippe-boulet-50b2b216/" title="LinkedIn link" target="_blank" rel="nofollow"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="https://github.com/bouletap" title="Github link" target="_blank" rel="nofollow"><i class="lni lni-github-original"></i></a></li>
                                <li><a href="https://discord.gg/RAE5kkHFKC" title="Discord link" target="_blank" rel="nofollow"><i class="lni lni-discord"></i></a></li>
                            </ul>
                        </div>
                    </div>      
                    <div class="methode">
                        <i class="lni lni-phone-set"></i>
                        <h3>Par téléphone</h3>
                        <p>Le numéro pour nous rejoindre est disponible sur demande</p>
                    </div>    
                    <div class="methode">
                        <i class="lni lni-map-marker"></i>
                        <h3>Par la poste</h3>
                        <p>196 rue du Richelieu,<br /> Dunham, J0E 1M0</p>
                    </div>         
                </div>
            </div>
            

            <div class="booking-calendar">
                <div class="methode">
                    <i class="lni lni-timer"></i>
                    <h3>Heures de disponibilité</h3>
                    <div class="disponibilite-time">
                        <div class="col3">
                            <p>Lundi et Vendredi<br />9.00AM - 11.30AM</p>
                        </div>
                        <div class="col3">
                            <p>Mardi au Jeudi<br />9.00AM - 15.00PM</p>
                        </div>
                        <div class="col3">
                            <p>Samedi et Dimanche<br />Fermé</p>
                        </div>
                    </div>
                </div>
                <div class="calendar">
                    <img src="/medias/images/temp-calendrier2.JPG" alt="Calendrier de rendez-vous">
                    <span class="coming-soon">Bientôt disponible</span>
                </div>
            </div>
        </section>

    </div>      
    
<script>        
    var submit = document.querySelector("#btn-contact-submit");
    submit.addEventListener("click", () => {
        var form = document.querySelector('#form-contact');
        var contact_form = new BouletAPForms('form-contact', 'Merci, votre message est envoyé');
        contact_form.submit(form);
    });



    function focusContactForm(element) {
        var subjectText = element.innerHTML;
        
        var subjectInput = document.querySelector('input[name="subject"]');
        subjectAutoTyping(subjectText, subjectInput, 500);

        var formContainer = document.querySelector('#form-contact').parentNode;
        formContainer.classList.add('fresh-focus');
        setTimeout(() => {
            document.querySelector('input[name="courriel"]').focus();
            formContainer.classList.remove('fresh-focus');
        }, 500);
    }

    function subjectAutoTyping(txt, target, maxTime) {
        var i = 0;
        var speed = parseInt(maxTime / txt.length);
        target.value = "";
        typeWriter(txt, target, i, speed);
    }

    function typeWriter(txt, target, i, speed) {
        if (i < txt.length) {
            target.value += txt.charAt(i);
            i++;
            setTimeout(() => {
                typeWriter(txt, target, i, speed);
            }, speed);
        }
    }
</script>