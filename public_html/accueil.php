<?php
    require_once APP_PATH . '/forms/audit_seo.php';
    $audit_form = new AuditSEO();
?>

<title>Portfolio André-Philippe Boulet</title>
<link rel="stylesheet" href="medias/css/pages/home.css" />    
</head>

<body class="home">
    <div class="header-container">        
        <?php include('template-parts/layouts/header.php'); ?>
    </div>
    <div class="page-content">     
        
        <section class="hero">
            <div class="hero-pitch">
                <h1>Développement<br> de sites web</h1>
                <p class="pitch">Bienvenue sur le site web de André-Philippe Boulet, un programmeur-analyste qui développe des logiciels web et mobiles depuis 2008.</p>
                <p class="cta-buttons">
                    <a href="#" class="btn-cta"><i class="lni lni-play"></i> À propos</a>
                    <a href="#" class="btn-cta"><i class="lni lni-popup"></i> Demande de mandat</a>
                </p>
            </div>
            <div class="picture">       
                <img class="image-ap" src="medias/images/andre-philippe-boulet-programmeur-logiciels-bouletap.jpg" alt="andre philippe boulet programmeur">
            </div>      
            <div class="col-lead">
                <div class="lead-box">
                    <img src="/medias/images/audit-form-preview-image.png" alt="Aperçu d'un test SEO gratuit">  
                    <span class="h3">Audit SEO gratuit</span>
                    <p>Nous auditons gratuitement votre site dans les 72h, sans frais ni engagement</p>
                    <div class="audit-form">
                        <form action="/" class="form-underlined" method="post" enctype="multipart/form-data">
                            <div class="form-col2">
                                <?php echo $audit_form->getField('website')->display(); ?>
                                <button type="submit"><i class="lni lni-arrow-right"></i></span></button>
                            </div>                    
                            
                        </form>
                    </div>              
                </div>

                <div class="mini-pitch">
                    <h3>Développeur web professionnel</h3>
                    <p>Disponible pour : </p>
                    <ul>
                        <li>Mandats à distance</li>
                        <li>Partenariat à long terme</li>
                        <li>Petits mandats ponctuels</li>
                    </ul>
                </div>
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

        <div class="websites-waves-shape">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.5 27.8" preserveAspectRatio="none">
                <path d="M283.5,9.7c0,0-7.3,4.3-14,4.6c-6.8,0.3-12.6,0-20.9-1.5c-11.3-2-33.1-10.1-44.7-5.7	s-12.1,4.6-18,7.4c-6.6,3.2-20,9.6-36.6,9.3C131.6,23.5,99.5,7.2,86.3,8c-1.4,0.1-6.6,0.8-10.5,2c-3.8,1.2-9.4,3.8-17,4.7	c-3.2,0.4-8.3,1.1-14.2,0.9c-1.5-0.1-6.3-0.4-12-1.6c-5.7-1.2-11-3.1-15.8-3.7C6.5,9.2,0,10.8,0,10.8V0h283.5V9.7z M260.8,11.3	c-0.7-1-2-0.4-4.3-0.4c-2.3,0-6.1-1.2-5.8-1.1c0.3,0.1,3.1,1.5,6,1.9C259.7,12.2,261.4,12.3,260.8,11.3z M242.4,8.6	c0,0-2.4-0.2-5.6-0.9c-3.2-0.8-10.3-2.8-15.1-3.5c-8.2-1.1-15.8,0-15.1,0.1c0.8,0.1,9.6-0.6,17.6,1.1c3.3,0.7,9.3,2.2,12.4,2.7	C239.9,8.7,242.4,8.6,242.4,8.6z M185.2,8.5c1.7-0.7-13.3,4.7-18.5,6.1c-2.1,0.6-6.2,1.6-10,2c-3.9,0.4-8.9,0.4-8.8,0.5	c0,0.2,5.8,0.8,11.2,0c5.4-0.8,5.2-1.1,7.6-1.6C170.5,14.7,183.5,9.2,185.2,8.5z M199.1,6.9c0.2,0-0.8-0.4-4.8,1.1	c-4,1.5-6.7,3.5-6.9,3.7c-0.2,0.1,3.5-1.8,6.6-3C197,7.5,199,6.9,199.1,6.9z M283,6c-0.1,0.1-1.9,1.1-4.8,2.5s-6.9,2.8-6.7,2.7	c0.2,0,3.5-0.6,7.4-2.5C282.8,6.8,283.1,5.9,283,6z M31.3,11.6c0.1-0.2-1.9-0.2-4.5-1.2s-5.4-1.6-7.8-2C15,7.6,7.3,8.5,7.7,8.6	C8,8.7,15.9,8.3,20.2,9.3c2.2,0.5,2.4,0.5,5.7,1.6S31.2,11.9,31.3,11.6z M73,9.2c0.4-0.1,3.5-1.6,8.4-2.6c4.9-1.1,8.9-0.5,8.9-0.8	c0-0.3-1-0.9-6.2-0.3S72.6,9.3,73,9.2z M71.6,6.7C71.8,6.8,75,5.4,77.3,5c2.3-0.3,1.9-0.5,1.9-0.6c0-0.1-1.1-0.2-2.7,0.2	C74.8,5.1,71.4,6.6,71.6,6.7z M93.6,4.4c0.1,0.2,3.5,0.8,5.6,1.8c2.1,1,1.8,0.6,1.9,0.5c0.1-0.1-0.8-0.8-2.4-1.3	C97.1,4.8,93.5,4.2,93.6,4.4z M65.4,11.1c-0.1,0.3,0.3,0.5,1.9-0.2s2.6-1.3,2.2-1.2s-0.9,0.4-2.5,0.8C65.3,10.9,65.5,10.8,65.4,11.1	z M34.5,12.4c-0.2,0,2.1,0.8,3.3,0.9c1.2,0.1,2,0.1,2-0.2c0-0.3-0.1-0.5-1.6-0.4C36.6,12.8,34.7,12.4,34.5,12.4z M152.2,21.1	c-0.1,0.1-2.4-0.3-7.5-0.3c-5,0-13.6-2.4-17.2-3.5c-3.6-1.1,10,3.9,16.5,4.1C150.5,21.6,152.3,21,152.2,21.1z"></path>
                <path d="M269.6,18c-0.1-0.1-4.6,0.3-7.2,0c-7.3-0.7-17-3.2-16.6-2.9c0.4,0.3,13.7,3.1,17,3.3	C267.7,18.8,269.7,18,269.6,18z"></path>
                <path d="M227.4,9.8c-0.2-0.1-4.5-1-9.5-1.2c-5-0.2-12.7,0.6-12.3,0.5c0.3-0.1,5.9-1.8,13.3-1.2	S227.6,9.9,227.4,9.8z"></path>
                <path d="M204.5,13.4c-0.1-0.1,2-1,3.2-1.1c1.2-0.1,2,0,2,0.3c0,0.3-0.1,0.5-1.6,0.4	C206.4,12.9,204.6,13.5,204.5,13.4z"></path>
                <path d="M201,10.6c0-0.1-4.4,1.2-6.3,2.2c-1.9,0.9-6.2,3.1-6.1,3.1c0.1,0.1,4.2-1.6,6.3-2.6	S201,10.7,201,10.6z"></path>
                <path d="M154.5,26.7c-0.1-0.1-4.6,0.3-7.2,0c-7.3-0.7-17-3.2-16.6-2.9c0.4,0.3,13.7,3.1,17,3.3	C152.6,27.5,154.6,26.8,154.5,26.7z"></path>
                <path d="M41.9,19.3c0,0,1.2-0.3,2.9-0.1c1.7,0.2,5.8,0.9,8.2,0.7c4.2-0.4,7.4-2.7,7-2.6	c-0.4,0-4.3,2.2-8.6,1.9c-1.8-0.1-5.1-0.5-6.7-0.4S41.9,19.3,41.9,19.3z"></path>
                <path d="M75.5,12.6c0.2,0.1,2-0.8,4.3-1.1c2.3-0.2,2.1-0.3,2.1-0.5c0-0.1-1.8-0.4-3.4,0	C76.9,11.5,75.3,12.5,75.5,12.6z"></path>
                <path d="M15.6,13.2c0-0.1,4.3,0,6.7,0.5c2.4,0.5,5,1.9,5,2c0,0.1-2.7-0.8-5.1-1.4	C19.9,13.7,15.7,13.3,15.6,13.2z"></path>
            </svg>		
        </div>

        <section class="fresh-websites">
            <h2>Besoin d'un site <br> <strong>rapidement?</strong></h2>
            <p class="pitch">Logiciels BouletAP propose <strong>3 options</strong> pour que vous soyez en ligne <strong>sans délai</strong></p>

            <div class="options">
                <div class="option">
                    <object class="icon-service-svg" data="medias/images/services/project-completion.svg" type="image/svg+xml"></object>
                    <h3>Vitrine pour <br>petites entreprise</h3>
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

        <section class="tech-and-testimonials">
            <div class="technologies">
                <h3><i class="lni lni-ruler-pencil"></i> Nous développons principalement avec ces technologies</h3>

                <div class="tech-tab-nav">
                    <button class="tab-link active" onclick="openTechTab(event, 'tech-tab-basic')">Langages</button>
                    <button class="tab-link" onclick="openTechTab(event, 'tech-tab-cms')">CMS & Framework</button>
                    <button class="tab-link" onclick="openTechTab(event, 'tech-tab-ops')">Server & Ops</button>
                    <button class="tab-link" onclick="openTechTab(event, 'tech-tab-tools')">Outils</button>
                    <button class="tab-link" onclick="openTechTab(event, 'tech-tab-less')">Expérimental</button>
                </div>

                <div id="tech-tab-basic" class="tech-tab active">
                    <h4>Languages</h4>

                    <div class="tech-description">
                        <span class="h5"><i class="lni lni-html5"></i> HTML</span>
                        <p>HTML est le langage standard pour créer et structurer du contenu Web. Il utilise des balises pour définir des éléments tels que des titres, des paragraphes, des liens et des images. Combiné avec CSS et JavaScript, HTML constitue l'épine dorsale des sites Web, permettant la création d'expériences en ligne interactives et visuellement attrayantes.</p>
                    </div>
                    
                    <div class="tech-description">
                        <i class="lni lni-css3"></i> CSS</span>
                        <p>CSS est un langage de style utilisé dans le développement Web pour contrôler la présentation des éléments HTML. Il définit la mise en page, les couleurs, les polices et d'autres aspects de conception, permettant aux développeurs de créer des pages Web visuellement attrayantes et cohérentes sur différents appareils. CSS est essentiel pour améliorer l’expérience utilisateur et l’attrait esthétique.</p>
                    </div>

                    <div class="tech-description">
                        <i class="lni lni-javascript"></i> JavaScript</span>
                        <p>Exécuté dans les navigateurs, le JavaScript permet un contenu Web dynamique et interactif. En tant que langage de script côté client, il améliore l'expérience utilisateur en gérant les événements, en manipulant le DOM et en communiquant avec les serveurs. JavaScript est crucial pour créer des applications Web modernes, réactives et attrayantes.</p>
                    </div>

                    <div class="tech-description">
                        <i class="lni lni-php"></i> PHP</span>
                        <p>PHP est un langage de script côté serveur largement utilisé pour le développement Web. Il traite les requêtes du serveur, génère du contenu dynamique et interagit avec les bases de données. PHP s'intègre parfaitement à HTML, facilitant la création de sites Web dynamiques et interactifs. Il s’agit d’un composant fondamental de nombreux systèmes de gestion de contenu populaires comme WordPress.</p>
                    </div>

                    <div class="tech-description">
                        <i class="lni lni-mysql"></i> MySQL</span>
                        <p>MySQL est un système de gestion de bases de données relationnelles utilisé pour stocker et gérer des données. Il utilise SQL (Structured Query Language) pour interroger, insérer, mettre à jour et supprimer des enregistrements dans des bases de données. MySQL est open source, évolutif et largement utilisé pour les applications Web, alimentant divers sites Web dynamiques et basés sur les données.</p>
                    </div>
                </div>

                <div id="tech-tab-cms" class="tech-tab">
                    <h4>CMS & Framework</h4>
                    
                    <div class="tech-description">
                        <i class="lni lni-wordpress"></i> WordPress</span>
                        <p></p>
                    </div>                    

                    
                    <div class="tech-description">
                        <i class="lni lni-angular"></i> Angular</span>
                        <p></p>
                    </div>

                    <div class="tech-description">
                        <i class="lni lni-react"></i> React</span>
                        <p></p>
                    </div>

                    <div class="tech-description">
                        <i class="lni lni-laravel"></i> Laravel</span>
                        <p></p>
                    </div>
                    
                    <div class="tech-description">
                        <i class="lni lni-wordpress"></i> SASS</span>
                        <p>....</p>
                    </div>      

                    <div class="tech-description">
                        <i class="lni lni-wordpress"></i> TypeScript</span>
                        <p>....</p>
                    </div>      

                    <div class="tech-description">
                        <i class="lni lni-wordpress"></i> Gulp</span>
                        <p>....</p>
                    </div>      

                </div>

                <div id="tech-tab-ops" class="tech-tab">
                    <h4>Server & Ops</h4>
                    
                    <div class="tech-description">
                        <i class="lni lni-github-original"></i> GitHub</span>
                        <p></p>
                    </div>
                    <div class="tech-description">
                        <i class="lni lni-cpanel"></i> CPanel</span>
                        <p></p>
                    </div>

                    
                </div>

                <div id="tech-tab-tools" class="tech-tab">
                    <h4>Outils</h4>
                    
                    <div class="tech-description">
                        <i class="lni lni-vs-code"></i> VS Code</span>
                        <p></p>
                    </div>

                    <div class="tech-description">
                        <i class="lni lni-vs-code"></i> Codux</span>
                        <p></p>
                    </div>

                    <div class="tech-description">
                        <i class="lni lni-google-drive"></i> Google Drive</span>
                        <p></p>
                    </div>
                </div>

                <div id="tech-tab-less" class="tech-tab">
                    <h4>Expérimental</h4>
                    

                    <div class="tech-description">
                        <i class="lni lni-swift"></i> Objective C / Swift</span>
                        <p></p>
                    </div>
                    
                    <div class="tech-description">
                        <i class="lni lni-shopify"></i> Shopify</span>
                        <p></p>
                    </div>
                </div>

            </div>
            <div class="testimonials">
                <h3>Voici quelques témoignages sur notre travail <i class="lni lni-friendly"></i></h3>
                <div class="testimonial">
                    <p class="content">&ldquo; I had the pleasure of managing André-Philippe during his stage at Pratt & Whitney Canada. Hands down one of the strongest developers I have ever seen. He has a strong desire to learn new technologies which translates to much shorter learning curves for him. I was most impressed with his ability to come up with creative solutions to tackle the most complex problems presented. Always eager for a challenge, I am happy to recommend André-Philippe in any development role.&rdquo;</p>
                    <p class="who">Kyle, IT Solution Architect</p>
                    <p class="business">Pratt & Whitney</p>
                </div>
            </div>
        </section>
        <script>
            function openTechTab(evt, targetName) {
                var tablinks = document.getElementsByClassName("tech-tab");
                for (var i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                    
                }
                tablinks = document.getElementsByClassName("tab-link");
                for (var i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                    
                }
                
                document.getElementById(targetName).className += " active";
                evt.currentTarget.className += " active";
                }
        </script>

            
        <section class="section-preview-portfolio" style="padding:80px;">
            <div class="section-description">
                <span class="subtitle">Portfolio</span>
                <h2>Visitez les projets de nos clients récents ou anciens</h2>
            </div>

            <div class="projets-container">
                <div class="container">
                    <input type="radio" name="slide" id="c1" checked>
                    <label for="c1" class="card">
                        <div class="row">
                            <div class="icon">1</div>
                            <div class="description">
                                <h4>Donald Royer Design</h4>
                                <p>Designer expérimenté pour vos logos ou projets artistiques</p>
                            </div>
                        </div>
                    </label>
                    <input type="radio" name="slide" id="c2" >
                    <label for="c2" class="card">
                        <div class="row">
                            <div class="icon">2</div>
                            <div class="description">
                                <h4>Eugène Laplante</h4>
                                <p>Service-conseils pour vos projets de construction</p>
                            </div>
                        </div>
                    </label>
                    <input type="radio" name="slide" id="c3" >
                    <label for="c3" class="card">
                        <div class="row">
                            <div class="icon">3</div>
                            <div class="description">
                                <h4>Le Gaboteur</h4>
                                <p>Journal francophone à Terre-Neuve et Labrador</p>
                            </div>
                        </div>
                    </label>
                    <input type="radio" name="slide" id="c4" >
                    <label for="c4" class="card">
                        <div class="row">
                            <div class="icon">4</div>
                            <div class="description">
                                <h4>Dégustation Vegas</h4>
                                <p>Jeu mobile compétitif pour dégustation de vins</p>
                            </div>
                        </div>
                    </label>
                    <input type="radio" name="slide" id="c5" >
                    <label for="c5" class="card">
                        <div class="row">
                            <div class="icon">5</div>
                            <div class="description">
                                <h4>Time on Target</h4>
                                <p>Conseils et installation de produits de systèmes de sécurité</p>
                            </div>
                        </div>
                    </label>
                    <input type="radio" name="slide" id="c6" >
                    <label for="c6" class="card">
                        <div class="row">
                            <div class="icon">+</div>
                            <div class="description">
                                <h4>Autres sites ou projets</h4>
                                <p>Consultez la section portfolio pour voir plus de projets !</p>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </section>



        <section class="services-offerts">
            <div class="section-description">
                <span class="subtitle">Services offerts</span>
                <h2>Développement <b>web</b> orienté vers <b>vos objectifs</b></h2>
                <p>Votre site Internet est une <b>vitrine disponible 24h/7j</b> pour présenter votre entreprise à <b>votre image, sans compromis</b>. Pour assurer votre succès commercial, il est <b>essentiel</b> de veillez à ce que votre présentation soit <b>rapide, réactive, accessible, conforme au référencement et sécurisée</b>.</p>
            </div>
            <div class="slider-services">
                <div class="developpement-nouveaux-sites slide">
                    <div class="slide-text">
                        <h3>Un site <b>rapide</b> et <b>performant</b> pour conservez <b>l'attention</b> de vos visiteurs</h3>
                        <p>Un site lent peut entraîner la frustration de vos clients ce qui a un impact négatif sur leur expérience. De plus, les moteurs de recherche considèrent la vitesse des pages comme un facteur de classement. Améliorer votre positionnement et vos ventes avec un site rapide et performant.</p>
                        <a href="#" class="btn-cta">Vérifier la rapidité de votre site</a>
                    </div>
                    <img src="/medias/images/services/undraw_success_factors_re_ce93.svg" alt="">
                </div>
                <div class="correctifs-responsive slide slide-reverse">
                    <div class="slide-text">
                        <h3><b>Téléphones mobiles</b> et la <b>présentation</b> de votre site sur <b>différents appareils</b></h3>
                        <p>Il ne faut jamais négliger l'expérience des utilisateurs mobiles qui visiteront votre site à partir de leur téléphone. Ces visiteurs seront particulièrement enclins à accepter ce que vous leur proposer s'ils trouvent rapidement l'information désirée.</p>
                        <a href="#" class="btn-cta">Vérifier l'accessibilité de votre site</a>
                    </div>
                    <img src="/medias/images/services/undraw_in_sync_re_jlqd3.svg" alt="">
                </div>
                <div class="correctifs-seo-accessibilite slide ">
                    <div class="slide-text">
                        <h3><b>SEO</b> et <b>Optimisation</b> de <br>vos <b>réseaux sociaux</b></h3>
                        <p>Vos clients n'arrivent pas par magie sur votre site. L'<b>optimisation de votre présence</b> sur les moteurs de recherche, les entrées directes et les médias sociaux est cruciale pour <b>votre croissance</b> et mérite une attention particulière.</p>
                        <a href="#" class="btn-cta">Vérifier le SEO de votre site</a>
                    </div>
                    <img src="/medias/images/services/Socialmedia-Marketing-1.svg" alt="">
                </div>
                <div class="correctifs-ux slide slide-reverse">
                    <div class="slide-text">
                        <h3>Prévenez les <b>accès malveillants</b> et <b>protéger</b> vos données utilisateurs.</h3>
                        <p>Votre site est il à l'abris des pirates et les robots qui cibles les failles et les données de vos clients ? Empèchez les accès non autorisés aux données et fichiers sauvegardés est crucial pour maintenir la confiance de vos clients et vous conformer aux réglementations en matière de confidentialité.</p>
                        <a href="#" class="btn-cta">Vérifier la sécurité de votre site</a>              
                    </div>
                    <img src="/medias/images/services/Ethical-hacking-1.svg" alt="">          
                </div>
            </div>
        </section>



        <section class="nouvelles-preview" style="padding:80px;">
            <h3>Consultez les dernières nouvelles ou autres publications de AP</h3>
            <p style="font-size:3em;">...</p>
        </section>



    </div>      


