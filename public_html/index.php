<?php
    require_once __DIR__ . '/../app/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio André-Philippe Boulet</title>

    <link rel="icon" href="favicon.png" sizes="192x192" />

    <link rel="stylesheet" href="medias/css/style.css" />
    <link rel="stylesheet" href="medias/vendors/lineicons/lineicons.css" />
    <link rel="stylesheet" href="medias/css/pages/home.css" />    
</head>
<body class="home">
    <div class="header-container">        
        <div class="waves waves-blue">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="color-primary" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
                <path class="color-primary" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
                <path class="color-primary" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
            </svg>
        </div>
        <?php include('template-parts/main-menu.php'); ?>
    </div>
    <div class="page-content">     
        
        <section class="hero">
            <div class="hero-pitch">
                <h1>Développement<br> de sites web</h1>
                <p class="pitch">Bienvenue sur le site web de André-Philippe Boulet, un<br> programmeur-analyste qui développe des logiciels web<br> et mobiles depuis plus de 15 ans</p>
                <p>
                    <a href="#" class="btn-cta"><i class="lni lni-play"></i> À propos</a>
                    <a href="#" class="btn-cta"><i class="lni lni-popup"></i> Demande de mandat</a>
                </p>
            </div>
            <div class="picture">
                <img class="image-ap" src="medias/images/andre-philippe-boulet-programmeur-logiciels-bouletap.jpg" alt="andre philippe boulet programmeur">
            </div>
            <div class="lead">
                <h3>Développeur web professionnel</h3>
                <p>Disponible pour : </p>
                <ul>
                    <li>Mandats à distance</li>
                    <li>Partenariat à long terme</li>
                    <li>Petits mandats ponctuels</li>
                </ul>
            </div>

            
        </section>

        <section class="stats">
            <div class="badge-stats">
                <div class="col">
                    <h4>75 +</h4>
                    <p>Site web conçus</p>
                </div>
                <div class="col">
                    <h4>15k +</h4>
                    <p>Heures à coder</p>
                </div>
                <div class="col">
                    <h4>16 +</h4>
                    <p>Ans d'expérience</p>
                </div>
                <div class="col">
                    <h4>10 +</h4>
                    <p>Langages maitrisés</p>
                </div>
            </div>
        </section>


        <section class="fresh-websites">
            <h2>Besoin d'un site <br> <strong>rapidement?</strong></h2>
            <p class="pitch">Logiciels BouletAP propose <strong>3 options</strong> pour que vous soyez en ligne <strong>sans délai</strong></p>

            <div class="options">
                <div class="option">
                    <object class="icon-service-svg" data="medias/images/services/project-completion.svg" type="image/svg+xml"></object>
                    <h3>Présentation de <br>votre offre d'affaires</h3>
                    <p>Ayez une vitrine accessible en tout temps et saisissez l’opportunité d’agrandir votre clientèle avec un site Web professionnel reflétant l’image de votre entreprise.</p>
                </div>
                <div class="option">
                    <h3>Commerce en Ligne <br>de toute envergure</h3>
                    <p>Ayez une vitrine accessible en tout temps et saisissez l’opportunité d’agrandir votre clientèle avec un site Web professionnel reflétant l’image de votre entreprise.</p>
                    <object class="icon-service-svg" data="medias/images/services/e-commerce.svg" type="image/svg+xml"></object>
                    
                </div>
                <div class="option">
                    <object class="icon-service-svg" data="medias/images/services/carte-affaires.svg" type="image/svg+xml"></object>                    
                    <h3>Site sans <br>gestionnaire de contenu</h3>
                    <p>Ayez une vitrine accessible en tout temps et saisissez l’opportunité d’agrandir votre clientèle avec un site Web professionnel reflétant l’image de votre entreprise.</p>
                </div>                
            </div>
        </section>


    </div>      






    <div class="footer-container">
        <?php include('template-parts/layouts/footer.php'); ?>
    </div>
    
    <script>
        const elementClicked = document.querySelector("#btnMainMenuToggle");
        const mainMenu = document.querySelector("#mainMenuContainer");
        const mainHeader = document.querySelector("#main-header");

        elementClicked.addEventListener("click", ()=>{
            mainMenu.classList.toggle("is-open");
            mainHeader.classList.toggle("menu-opened");
        });
        // jQuery(document).ready(function() {
        //     jQuery('.main-menu .menu-toggle').on('click', function() {
        //         var mainMenu = jQuery(this).parents('.main-menu');
        //         mainMenu.toggleClass('is-open');
        //         mainMenu.parents('#main-header').toggleClass('menu-opened');
        //     }); 
        // });
    </script>
</body>
</html>