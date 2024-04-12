<?php
    $nouvelle = $data['nouvelle'];
?>
<link rel="stylesheet" href="/medias/css/blog.css" />       
    <title>Toutes les nouvelles - André-Philippe Boulet</title> 

    <style>
        .section-description {
            background-image: url('<?php echo $nouvelle->preview_image; ?>');
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
                <p><?php echo $nouvelle->preview_desc; ?></p>        
                <a href="/nouvelles" class="breadcrumb"><i class="lni lni-arrow-left"></i> Retour aux nouvelles</a>   
            </div>

        </section>

        <div class="content-with-sidebar">

            <div class="content">
                <section class="article-content">
                    
                    <p>Fini le temps où André-Philippe Boulet travaillait de son salon ou d’une petite chambre d’appartement. Quoique nous prônons le minimalisme et le respect de l’environnement, le climat de travail n’est pas le même lorsqu’on côtoie d’autres personnes ou entreprises au quotidien. Il y a maintenant près de 2 ans que l’entreprise Logiciels BouletAP est créée et le bureau de travail à même mon domicile commence à devenir comme une prison. Nous avons connu le bonheur du télétravail : pas de transport, liberté et café à volonté sont des avantages sans pareil. Par contre, la solitude, l’équilibre entre loisir et travail constant, le chat demandant toujours plus d’attention, les voisins bruyants, la cigarette, etc… viennent les contrebalancer grandement et si Montréal offre continuellement des activités variées, encore faut-il sortir pour tenter le coup. Devenant de plus en plus ermite, un changement d’environnement était de mise.</p>
                    <p>J’ai offert mes services de développeur depuis bientôt 2 ans dans la région de Montréal. Si j’adore la ville, sa communauté et son ambiance, ce n’est pas de là que je viens ni à cet endroit que la plupart de mes clients sont situés. Une opportunité s’est proposée à moi dans ma région natale et j’ai décidé de la saisir. Ainsi, il me fait plaisir de vous annoncer, cher lecteur, le déménagement des bureaux de Logiciels BouletAP à la Place Paul Tremblay à Cowansville.</p>
                    <p>La Place Paul Tremblay est située au 104 rue Sud à Cowansville, J2K 2X2. Cette place d’affaires héberge des entreprises de la région depuis plus de 50 ans. Depuis quelques années, l’entreprise propriétaire rénove tous les bureaux ainsi c’est maintenant une place commerciale de choix pour les entrepreneurs et leurs employés. N’ayant plus qu’un seul local disponible, j’ai saisi ma chance d’y emménager le plus rapidement possible. Ma nouvelle adresse est donc le 104 rue Sud, Bureau 260 à Cowansville, J2K 2X2.</p>
                    <p>Il me fera plaisir de vous y accueillir pour une visite des lieux, pour discuter des besoins de votre entreprise ou simplement si vous avez besoin de conseils sur les technologies de l’information. Nos heures d’ouverture sont du lundi au vendredi de 9h à 15h. En cas d’urgence, vous pouvez me rejoindre en tout temps sur mon cellulaire au 450-775-2905.</p>
                    <p>Venez-nous parler de votre propre expérience avec le télétravail, de vos besoins web ou de votre point de vue sur la région de Brome-Missisquoi dans les commentaires ci-bas !</p>
                
                </section>
            </div>

            <div class="sidebar">
                <h3>Trouver une nouvelle</h3>
                <hr>
                <div class="sidebar-content">
                    <div class="bloc search-form">
                        <h4>Par mot-clé</h4>
                        <form action="/" class="form-underlined" method="post" enctype="multipart/form-data">
                            <div class="form-col2">
                                <input type="text" placeholder="Entrez un mot-clé...">
                                <button type="submit"><i class="lni lni-arrow-right"></i></span></button>
                            </div>                    
                            
                        </form>
                    </div>
                    <div class="bloc">
                        <h4>Par catégories</h4>
                        <ul>
                            <li><a href="#">Nouvelles</a></li>
                            <li><a href="#">Cheatsheet</a></li>
                            <li><a href="#">Trucs et astuces</a></li>
                        </ul>
                    </div>
                    <div class="bloc">
                        <h4>Archives</h4>
                        <ul>
                            <li><a href="#">Avril 2024</a></li>
                            <li><a href="#">Mars 2024</a></li>
                            <li><a href="#">Février 2024</a></li>
                            <li><a href="#">Janvier 2024</a></li>
                            <li><a href="#">2023</a></li>
                            <li><a href="#">2020-2022</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>      






    