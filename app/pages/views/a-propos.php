

<link rel="stylesheet" href="/medias/css/pages.css" />       
    <title>À propos - André-Philippe Boulet</title> 
</head>
<body class="page-a-propos page-content">
    <div class="header-container">        
        <?php include('_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">
            <div class="page-header">
                <span class="subtitle">À propos</span>
                <h2>André-Philippe Boulet</h2>     
                <p>Programmeur spécialisé dans le développement web et les technologies de l'information </p>           
            </div>
        </section>


        <section class="presentation">

            <div class="description">
                <h1>ANDRÉ-PHILIPPE BOULET - DÉVELOPPEMENT WEB À DISTANCE</h1>

                <span class="logo-with-name">
                    <img src="/medias/images/logo.png" alt="Logo de Logiciels BouletAP">
                    <div>
                        <strong>André-Philippe Boulet</strong><br />
                        Développeur web - Disponible pour mandats à distance
                    </div>
                </span>

                <div class="profile-image-mobile">                    
                    <img src="/medias/images/andre-philippe-boulet-programmeur-logiciels-bouletap.jpg" alt="Photo de André-Philippe Boulet">
                </div>

                <p class="bigger">Bienvenue sur le site web de André-Philippe Boulet, un programmeur-analyste qui développe des logiciels web et mobiles depuis plus de 15 ans</p>             

                <p>J’offre mes services pour le développement ou la maintenance de sites Internet, la création d’applications mobiles et pour d’autres besoins logiciels divers.</p>

                <p>Ce qui m’intéresse dans le développement de logiciel, c’est d’assister les entreprises dans leur croissance et l’atteinte de leurs objectifs. J’adore automatiser les tâches répétitives, développer les solutions nécessaires pour augmenter les ventes ou simplifier la prise de décision à l’aide d’outils adaptés.</p>

                <p>N’hésitez pas à me contacter. Il me fera plaisir de discuter avec vous.</p>
            </div>

            <div class="profile-image">
                <img src="/medias/images/andre-philippe-boulet-programmeur-logiciels-bouletap.jpg" alt="Photo de André-Philippe Boulet">
            </div>

        </section>



        <section class="tech-and-testimonials">
            <div class="technologies">
                <h3><i class="lni lni-ruler-pencil"></i> Nous développons principalement avec ces technologies</h3>

                <div class="tech-tab-nav">
                    <button class="tab-link active" onclick="openTechTab(event, 'tech-tab-basic')">Programmation</button>
                    <button class="tab-link" onclick="openTechTab(event, 'tech-tab-ops')">Server & Ops</button>
                    <button class="tab-link" onclick="openTechTab(event, 'tech-tab-cms')">CMS & Gestion</button>
                    <button class="tab-link" onclick="openTechTab(event, 'tech-tab-api')">API & Autres</button>
                </div>

                <div id="tech-tab-basic" class="tech-tab active">

                    <div class="tech-bloc">
                        <div class="main-techs">
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-html5"></i> HTML</span>
                                <p>HTML est le langage standard pour créer et structurer du contenu Web. Il utilise des balises pour définir des éléments tels que des titres, des paragraphes, des liens et des images. Combiné avec CSS et JavaScript, HTML constitue l'épine dorsale des sites Web, permettant la création d'expériences en ligne interactives et visuellement attrayantes.</p>
                            </div>
                            
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-css3"></i> CSS</span>
                                <p>CSS est un langage de style utilisé dans le développement Web pour contrôler la présentation des éléments HTML. Il définit la mise en page, les couleurs, les polices et d'autres aspects de conception, permettant aux développeurs de créer des pages Web visuellement attrayantes et cohérentes sur différents appareils. CSS est essentiel pour améliorer l’expérience utilisateur et l’attrait esthétique.</p>
                            </div>
                        </div>
                        <div class="derivatives">
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-domain"></i> SASS</span>
                                <p>Sass est un langage de script de préprocesseur pour CSS. Il étend CSS avec des fonctionnalités telles que les variables, l'imbrication et les mixins, améliorant ainsi la maintenabilité et la réutilisation du code. Les fichiers Sass sont compilés en CSS standard, offrant un moyen plus efficace et organisé de styliser les applications Web et les sites Web.</p>
                            </div>    

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-tailwindcss"></i> TailwindCSS</span>
                                <p>Tailwind CSS est un framework CSS axé sur les utilitaires qui rationalise le processus de développement Web. Contrairement aux frameworks traditionnels avec des composants préconçus, Tailwind propose des classes utilitaires de bas niveau pour styliser directement les éléments HTML. Cette approche offre flexibilité et personnalisation tout en conservant un système de conception cohérent, ce qui la rend efficace pour créer des interfaces utilisateur modernes et réactives.</p>
                            </div>
                            
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-bootstrap-5"></i> Bootstrap</span>
                                <p>Bootstrap est un framework CSS open source populaire développé par Twitter. Il fournit une collection de composants et d'outils HTML, CSS et JavaScript, facilitant le développement rapide et réactif de sites Web et d'applications Web. Le système de grille de Bootstrap, les composants pré-stylisés et les fonctionnalités de conception réactive simplifient la création d'interfaces utilisateur modernes et cohérentes.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tech-bloc">
                        <div class="main-techs tech-1">
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-javascript"></i> JavaScript</span>
                                <p>Exécuté dans les navigateurs, le JavaScript permet un contenu Web dynamique et interactif. En tant que langage de script côté client, il améliore l'expérience utilisateur en gérant les événements, en manipulant le DOM et en communiquant avec les serveurs. JavaScript est crucial pour créer des applications Web modernes, réactives et attrayantes.</p>
                            </div>
                        </div>
                        <div class="derivatives">
                            
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-angular"></i> Angular</span>
                                <p>Angular est un framework JavaScript open source basé sur TypeScript développé par Google. Il simplifie le processus de création d'applications Web dynamiques d'une seule page en fournissant une structure modulaire, une liaison de données bidirectionnelle et une injection de dépendances. Angular est largement utilisé pour créer des interfaces utilisateur robustes et réactives dans le développement Web moderne.</p>
                            </div>

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-react"></i> React</span>
                                <p>React est une bibliothèque JavaScript permettant de créer des interfaces utilisateur, développée et maintenue par Facebook. Il permet aux développeurs de créer des composants d'interface utilisateur réutilisables et de mettre à jour efficacement la vue en réponse aux modifications des données. Le DOM virtuel de React améliore les performances, ce qui en fait un choix populaire pour créer des applications Web interactives et évolutives.</p>
                            </div>

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-typescript"></i> TypeScript</span>
                                <p>TypeScript est un dérivé de JavaScript qui ajoute un typage statique au langage. Développé par Microsoft, il améliore JavaScript en permettant aux développeurs de définir des types de variables, des interfaces et des classes. TypeScript est transpilé en JavaScript, permettant une meilleure prise en charge des outils et détectant les erreurs au moment de la compilation, ce qui en fait un choix solide pour le développement Web à grande échelle.</p>
                            </div> 
                            
                            <div class="tech-description">
                                <span class="h5">jQuery</span>
                                <p>...</p>
                            </div>
                        </div>
                    </div>

                    <div class="tech-bloc">
                        <div class="main-techs">
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-php"></i> PHP</span>
                                <p>PHP est un langage de script côté serveur largement utilisé pour le développement Web. Il traite les requêtes du serveur, génère du contenu dynamique et interagit avec les bases de données. PHP s'intègre parfaitement à HTML, facilitant la création de sites Web dynamiques et interactifs. Il s’agit d’un composant fondamental de nombreux systèmes de gestion de contenu populaires comme WordPress.</p>
                            </div>

                            <div class="tech-description">
                                <div class="h5"><i class="lni lni-mysql"></i> SQL</div>
                                <p>MySQL est un système de gestion de bases de données relationnelles utilisé pour stocker et gérer des données. Il utilise SQL (Structured Query Language) pour interroger, insérer, mettre à jour et supprimer des enregistrements dans des bases de données. MySQL est open source, évolutif et largement utilisé pour les applications Web, alimentant divers sites Web dynamiques et basés sur les données.</p>
                            </div>
                        </div>
                        <div class="derivatives">          
                                                 
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-laravel"></i> Laravel</span>
                                <p>Laravel est un framework Web PHP qui simplifie et rationalise le développement Web. Connu pour sa syntaxe élégante et ses fonctionnalités expressives, Laravel propose des outils de routage, de mise en cache, de migration de bases de données, etc. Il promeut le modèle architectural MVC, le rendant efficace pour créer des applications Web modernes, évolutives et maintenables.</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-domain"></i> RESTful API</span>
                                <p>Une API RESTful (Representational State Transfer) est un style architectural pour la conception d'applications en réseau. Il utilise des méthodes HTTP standard (GET, POST, PUT, DELETE) pour effectuer des opérations CRUD (Create, Read, Update, Delete) sur les ressources. Les API RESTful sont sans état, évolutives et largement utilisées pour créer des services Web permettant une communication transparente entre différents systèmes logiciels.</p>
                            </div> 

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-ux"></i> OAuth (Google, Facebook)</span>
                                <p>OAuth (Open Authorization) est un protocole standard ouvert qui permet un accès sécurisé et délégué aux ressources, généralement sur le Web. Il permet aux utilisateurs d'accorder à des applications tierces un accès limité à leurs ressources sans partager leurs informations d'identification. OAuth est largement utilisé pour l'authentification et l'autorisation dans divers services en ligne, favorisant un accès aux données sécurisé et contrôlé.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tech-bloc">
                        <div class="main-techs tech-1">
                            <div class="tech-description">
                                <span class="h5">Également</span>
                            </div>
                        </div>
                        <div class="derivatives">                               
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-python"></i> Python</span>
                                <p>Python est un langage de programmation polyvalent de haut niveau connu pour sa lisibilité et sa simplicité. Largement utilisées dans le développement Web, la science des données et l'automatisation, les vastes bibliothèques et la communauté de Python en font un choix incontournable pour diverses applications, des scripts aux projets à grande échelle.</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-microsoft"></i> C#</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-mobile"></i> Objective C</span>
                                <p>Objective-C est un langage de programmation principalement utilisé pour le développement d'applications macOS et iOS. C'était le langage principal de développement de logiciels d'Apple avant l'introduction de Swift. Objective-C combine la programmation orientée objet de style Smalltalk avec le langage de programmation C, offrant un environnement d'exécution dynamique et des fonctionnalités orientées objet.</p>
                            </div>

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-vuejs"></i> VueJS</span>
                                <p>Vue.js est un framework JavaScript progressif pour créer des interfaces utilisateur. Il est conçu pour être progressivement adaptable, permettant aux développeurs de l'intégrer dans des projets existants ou de l'utiliser comme cadre à part entière. Vue.js se concentre sur la simplicité et la flexibilité, le rendant facile à comprendre et à utiliser pour le développement front-end, en particulier dans la création d'interfaces Web interactives et réactives.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tech-tab-cms" class="tech-tab">
                    <div class="tech-bloc">
                        <div class="main-techs tech-1">

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-wordpress-fill"></i> WordPress</span>
                                <p>WordPress est un système de gestion de contenu (CMS) open source largement utilisé pour la création de sites Web. Réputé pour son interface conviviale et son vaste écosystème de plugins, il permet aux utilisateurs, même ayant des connaissances techniques limitées, de créer et de gérer des sites Web. WordPress prend en charge les blogs, les sites professionnels et bien plus encore, ce qui en fait une plateforme polyvalente pour divers projets Web.</p>
                            </div>  
                        
                        </div>
                        <div class="derivatives">  
                            <div class="tech-description">
                                <span class="h5">ACF</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5">Elementor</span>
                                <p>Elementor est un plugin de création de pages par glisser-déposer populaire pour WordPress. Il permet aux utilisateurs de créer et de personnaliser visuellement des pages Web sans avoir besoin de codage. Avec une interface conviviale et une variété de widgets et de modèles, Elementor permet aux utilisateurs de concevoir et de créer facilement des sites Web, ce qui en fait un outil largement utilisé dans l'écosystème WordPress.</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5">WooCommerce</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5">WPML</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-vs-code"></i> Custom Themes & Plugins</span>
                                <p>...</p>
                            </div>
                        </div>               
                    </div>                  

                    <div class="tech-bloc">
                        <div class="main-techs tech-1">
                            <div class="tech-description">
                                <span class="h5">Autres CMS</span>
                            </div>
                        </div>
                        <div class="derivatives">  
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-magento"></i> Magento</span>
                                <p>Magento est une plateforme de commerce électronique open source écrite en PHP. Acquis par Adobe, il est largement utilisé pour créer des boutiques en ligne. Magento offre des fonctionnalités robustes pour gérer les produits, les commandes et les paiements, avec une flexibilité de personnalisation. Son évolutivité et son extensibilité en font un choix populaire pour les entreprises de différentes tailles dans le secteur du commerce électronique.</p>
                            </div>    
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-shopify"></i> Shopify</span>
                                <p>Shopify est une plateforme de commerce électronique qui permet aux entreprises de créer et de gérer des boutiques en ligne. Il fournit une interface conviviale, des modèles personnalisables et une gamme d'outils pour gérer les produits, les commandes et les paiements. Avec des fonctionnalités telles que le paiement sécurisé et des outils marketing intégrés, Shopify permet aux entreprises d'établir et de gérer avec succès des opérations de vente au détail en ligne.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tech-bloc">
                        <div class="main-techs tech-1">  
                            <span class="h5">Gestion de projets</span>
                        </div>
                        <div class="derivatives">  
                            

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-atlassian"></i> Jira | Atlassian</span>
                                <p>Jira est un outil de gestion de projet et de suivi des problèmes développé par Atlassian. Largement utilisé dans le développement de logiciels, il aide les équipes à planifier, suivre et gérer les tâches et les projets. Jira fournit des fonctionnalités de suivi des problèmes, de gestion des flux de travail, de collaboration et de reporting, ce qui en fait une solution complète pour le développement agile et la gestion de projet.</p>
                            </div>
                                                        
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-trello"></i> Trello</span>
                                <p>...</p>
                            </div>

                            <div class="tech-description">
                                <span class="h5">Suite Zoho</span>
                                <p>...</p>
                            </div>

                            <div class="tech-description">
                                <span class="h5">Mondays</span>
                                <p>...</p>
                            </div>
                            
                            <div class="tech-description">
                                <span class="h5">Développement agile</span>
                                <p>Le développement agile est une approche itérative et flexible du développement logiciel. Il donne la priorité à la collaboration, à l'adaptabilité et aux commentaires des clients tout au long du processus de développement. Les méthodologies agiles, comme Scrum ou Kanban, impliquent des cycles de développement courts (itérations ou sprints) pour fournir rapidement des incréments logiciels fonctionnels. Cette méthodologie met l'accent sur l'amélioration continue, le travail d'équipe et la réactivité aux exigences changeantes.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="tech-tab-ops" class="tech-tab">

                    <div class="tech-bloc">
                        <div class="main-techs">  
                            <div class="tech-description">
                                <span class="h5">Développement</span>
                                <p...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5">Intégration / Déploiement</span>
                                <p...</p>
                            </div>
                        </div>
                        <div class="derivatives">  
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-github-original"></i> GitHub</span>
                                <p>GitHub est une plateforme Web pour le contrôle de versions et le développement collaboratif de logiciels. Il utilise Git, un système de contrôle de version distribué, pour gérer et suivre les modifications dans les référentiels de code. GitHub offre des fonctionnalités telles que les demandes d'extraction, le suivi des problèmes et des outils de collaboration, ce qui en fait une plateforme centrale permettant aux développeurs de travailler sur des projets, de contribuer et de gérer le code de manière collaborative.</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-docker"></i> Docker</span>
                                <p>Docker est une plateforme permettant de développer, d'expédier et d'exécuter des applications dans des conteneurs. Les conteneurs fournissent un environnement léger, portable et cohérent sur différents systèmes. Docker permet aux développeurs de regrouper les applications et leurs dépendances dans des conteneurs, garantissant ainsi un déploiement et une mise à l'échelle transparentes. Il simplifie le développement et le déploiement de logiciels, favorisant l'efficacité et la cohérence.</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5">SourceTree</span>
                                <p>SourceTree est un client d'interface utilisateur graphique (GUI) gratuit pour les systèmes de contrôle de version Git et Mercurial. Développé par Atlassian, il simplifie la gestion des référentiels, permettant aux utilisateurs de visualiser et d'interagir avec leur code à version contrôlée. SourceTree fournit une interface intuitive pour des tâches telles que la validation des modifications, la création de branches et la fusion, permettant aux développeurs de travailler plus facilement avec des flux de travail de contrôle de version complexes.</p>
                            </div> 
                            <div class="tech-description">
                                <span class="h5">Gulp</span>
                                <p>Gulp est un exécuteur de tâches basé sur JavaScript qui automatise diverses tâches de développement dans des projets Web. Il simplifie les flux de travail courants tels que la minification, la compilation, les tests et l'optimisation des ressources frontales telles que HTML, CSS et JavaScript. Les développeurs utilisent Gulp pour rationaliser et améliorer l'efficacité de leurs processus de construction dans les projets de développement Web.</p>
                            </div>   
                        </div>
                    </div>
                    

                    <div class="tech-bloc">
                        <div class="main-techs tech-1">  
                            <span class="h5">Opérations serveur</span>
                        </div>
                        <div class="derivatives">  
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-cloud-sync"></i> SSH</span>
                                <p>SSH, ou Secure Shell, est un protocole réseau cryptographique utilisé pour sécuriser les communications et l'administration à distance sur un réseau. Il fournit un moyen sécurisé d'accéder et de gérer des appareils, généralement des serveurs, sur un réseau non sécurisé. SSH crypte les données pendant la communication, empêchant tout accès non autorisé et garantissant la confidentialité et l'intégrité des informations transmises.</p>
                            </div>  

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-cpanel"></i> CPanel</span>
                                <p>cPanel est un panneau de contrôle basé sur le Web largement utilisé dans les environnements d'hébergement Web. Il fournit une interface conviviale pour gérer divers aspects d'un site Web ou d'un serveur, notamment la gestion des fichiers, la configuration de la messagerie, les paramètres de domaine, etc. cPanel simplifie l'administration du serveur, le rendant accessible aux utilisateurs sans expertise technique approfondie.</p>
                            </div> 

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-cloudflare"></i> Cloudflare</span>
                                <p>SSH, ou Secure Shell, est un protocole réseau cryptographique utilisé pour sécuriser les communications et l'administration à distance sur un réseau. Il fournit un moyen sécurisé d'accéder et de gérer des appareils, généralement des serveurs, sur un réseau non sécurisé. SSH crypte les données pendant la communication, empêchant tout accès non autorisé et garantissant la confidentialité et l'intégrité des informations transmises.</p>
                            </div> 

                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-nodejs"></i> NodeJS</span>
                                <p>Node.js est un environnement d'exécution JavaScript open source côté serveur qui permet l'exécution de code JavaScript en dehors d'un navigateur Web. Il utilise le moteur JavaScript V8 de Google Chrome et permet aux développeurs de créer des applications évolutives et performantes. Node.js est couramment utilisé pour créer des serveurs Web, des API et des applications en temps réel.</p>
                            </div>    
                        
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-ux"></i> Gestion DNS</span>
                                <p>La gestion DNS implique la supervision et le contrôle des paramètres du système de noms de domaine pour un domaine ou un réseau particulier. Cela inclut des tâches telles que la configuration des enregistrements de domaine (comme A, CNAME, MX), la mise à jour des serveurs de noms et la modification des paramètres DNS pour garantir une résolution précise et fiable du domaine vers l'adresse IP. La gestion DNS est cruciale pour maintenir l'accessibilité et la fonctionnalité d'un site Web.</p>
                            </div> 
                        </div>
                    </div>
                    
                                                         
                </div>

                <div id="tech-tab-api" class="tech-tab">
                    

                    <div class="tech-bloc">
                        <div class="main-techs tech-1">  
                            <span class="h5">Paiement en ligne</span>
                        </div>
                        <div class="derivatives">
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-stripe"></i> Stripe</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-paypal"></i> PayPal</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5">Square</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"> Moneris</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"> Authorize.NET</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5"> Netbanx/PaySafe</span>
                                <p>...</p>
                            </div>
                        </div>
                    </div>

                    <div class="tech-bloc">
                        <div class="main-techs tech-1">  
                            <span class="h5">Automatisation</span>
                        </div>
                        <div class="derivatives">
                            <div class="tech-description">
                                <span class="h5"><i class="lni lni-zapier"></i> Zapier API</span>
                                <p>...</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5">Zoho API</span>
                                <p>Zoho est une suite d'applications logicielles basées sur le cloud conçues pour les entreprises. Il offre une large gamme d'outils pour divers aspects des opérations commerciales, notamment la gestion de la relation client (CRM), la gestion de projet, la comptabilité, le marketing, etc. Zoho fournit une plate-forme intégrée pour rationaliser et gérer divers processus métier, améliorant ainsi la productivité et la collaboration.</p>
                            </div>
                            <div class="tech-description">
                                <span class="h5">Bookeo API</span>
                                <p>Bookeo est un système de rendez-vous et de réservation en ligne conçu pour les entreprises de divers secteurs, tels que les visites et activités, les cours et les rendez-vous. Il permet aux entreprises d'accepter des réservations et des réservations en ligne, de gérer les horaires, de traiter les paiements et de rationaliser les interactions avec les clients. Bookeo vise à simplifier le processus de réservation et à améliorer l'efficacité commerciale des entreprises orientées services.</p>
                            </div>
                        </div>
                    </div>                    
                    

                </div>


            </div>
            <div class="testimonials">
                <h3>Voici quelques témoignages sur notre travail <i class="lni lni-friendly"></i></h3>
                <div class="testimonials-list">
                    <div class="testimonial">
                        <p class="content">&ldquo; I had the pleasure of managing André-Philippe during his stage at Pratt & Whitney Canada. Hands down one of the strongest developers I have ever seen. He has a strong desire to learn new technologies which translates to much shorter learning curves for him. I was most impressed with his ability to come up with creative solutions to tackle the most complex problems presented. Always eager for a challenge, I am happy to recommend André-Philippe in any development role.&rdquo;</p>
                        <p class="who">Kyle, IT Solution Architect</p>
                        <p class="business">Pratt & Whitney</p>
                    </div>
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


        <section class="download-cv">
            <div>
                <span class="title">Téléchargez la version PDF de mon CV</span>
                <a class="btn-cta" href="/medias/pdf/CV-Andre-Philippe-Boulet.pdf" target="_blank">Cliquez pour téléchager</a>
            </div>
        </section>


        <section class="parcours hide">
            
            <table>
                <tr>
                    <td></td>
                    <td>
                        <p>
                            Développeur logiciels<br>
                            Logiciels BouletAP<br>
                            Jan 2018 - Jan 2023<br>
                            Région de Montréal, Canada
                        </p>
                        <ul>
                            <li>Design et programmation de sites Internet pour petites et moyennes entreprises</li>
                            <li>Développement de commerces électroniques</li>
                            <li>Programmation sur mesure</li>
                            <li>Développement d'applications mobiles multi-plateformes</li>
                            <li>Reprise de projets et maintenance</li>
                        </ul>
                    </td>
                </tr>
            </table>
            


            <div>
                <p><img src="/medias/images/cv/experience-logiciels-bouletap.JPG" alt=""></p>             
                <p><img src="/medias/images/cv/experience-love-energetics.JPG" alt=""></p>             
                <p><img src="/medias/images/cv/experience-wineout.JPG" alt=""></p>             
                <p><img src="/medias/images/cv/experience-pratt-whitney.JPG" alt=""></p>             
                <p><img src="/medias/images/cv/experience-megavolt.JPG" alt=""></p>             
                <p><img src="/medias/images/cv/experience-cobi-creationik.JPG" alt=""></p>            
            </div> 

        </section>

    </div>      