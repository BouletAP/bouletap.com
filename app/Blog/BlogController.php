<?php

use Models\Entities\Article;

class BlogController {


    public function nouvelle() {
        $nouvelle = new Article();
        $nouvelle->id = 1;
        $nouvelle->slug = "nouvelle-place-d-affaires";
        $nouvelle->categorie = "Nouvelles";
        $nouvelle->title = "Nouvelle place d'affaires de Logiciels BouletAP";
        $nouvelle->preview_image = "/medias/images/nouvelles/image-bureau-cowansville-bouletap.jpg";
        $nouvelle->preview_desc = "Fini le temps où André-Philippe Boulet travaillait de son salon ou d'une petite chambre d'appartement. Quoique nous prônons le minimalisme et le respect de l'environnement,";
        $nouvelle->date = "Octobre 2019";
        
        $data['nouvelle'] = $nouvelle;

        
        // $categories = [
        //     'publications' => 'Toutes les publications', 
        //     'cheatsheets' => 'Cheatsheet',
        //     'nouvelles' => 'Nouvelles', 
        //     'projets' => 'Projets', 
        //     'trucs-et-astuces' => 'Trucs et Astuces', 
        // ];
        
        // $mots_cles = [
        //     'html_css' => 'HTML/CSS', 
        //     'javascript' => 'Javascript', 
        //     'php' => 'PHP',
        //     'wordpress' => 'WordPress'
        // ];

        $data['categories'] = Article::get_categories();
        $data['keywords'] = Article::get_keywords();
        $data['selected_category'] = $nouvelle->categorie;

        echo Models\Core\View::display("Blog/nouvelle.php", $data);
    }

    
    public function nouvelles() {

        // filter by category
        $requested_type = str_replace('/', '', $_SERVER['REQUEST_URI']);
        
        
        // $categories = [
        //     'publications' => 'Toutes les publications', 
        //     'cheatsheets' => 'Cheatsheet',
        //     'nouvelles' => 'Nouvelles', 
        //     'projets' => 'Projets', 
        //     'trucs-et-astuces' => 'Trucs et Astuces', 
        // ];

        // $mots_cles = [
        //     'html_css' => 'HTML/CSS', 
        //     'javascript' => 'Javascript', 
        //     'php' => 'PHP',
        //     'wordpress' => 'WordPress'
        // ];


        $data['categories'] = Article::get_categories();
        $data['keywords'] = Article::get_keywords();
        
        $selected_category = array_key_exists($requested_type, $data['categories']) ? $data['categories'][$requested_type] : 'Tous les articles';

        $data['selected_category'] = $selected_category;



        $nouvelle_1 = new Article();
        $nouvelle_1->id = 1;
        $nouvelle_1->slug = "nouvelle-place-d-affaires";
        $nouvelle_1->categorie = "Nouvelles";
        $nouvelle_1->title = "Nouvelle place d'affaires de Logiciels BouletAP";
        $nouvelle_1->preview_image = "/medias/images/nouvelles/image-bureau-cowansville-bouletap.jpg";
        $nouvelle_1->preview_desc = "Fini le temps où André-Philippe Boulet travaillait de son salon ou d'une petite chambre d'appartement. Quoique nous prônons le minimalisme et le respect de l'environnement,";
        $nouvelle_1->date = "Octobre 2019";


        $nouvelle_2 = new Article();
        $nouvelle_2->id = 2;
        $nouvelle_2->slug = "covid-bureau-ferme";
        $nouvelle_2->categorie = "Nouvelles";
        $nouvelle_2->title = "Covid - Bureau principal fermé";
        $nouvelle_2->preview_image = "/medias/images/nouvelles/cdc-w9KEokhajKw-unsplash-lowres.jpg";
        $nouvelle_2->preview_desc = "Nos services de développement de sites Internet, de programmation web, de maintenance WordPress et d’aide ou support sont toujours disponibles en tout temps.";
        $nouvelle_2->date = "Décembre 2020";


        $nouvelle_3 = new Article();
        $nouvelle_3->id = 3;
        $nouvelle_3->slug = "creer-une-page-service-pour-mieux-convertir-vos-visiteurs-en-clients";
        $nouvelle_3->categorie = "Trucs et Astuces";
        $nouvelle_3->title = "Créer une page service pour mieux convertir vos visiteurs en clients";
        $nouvelle_3->preview_image = "/medias/images/nouvelles/austin-distel-goFBjlQiZFU-unsplash-v2.jpg";
        $nouvelle_3->preview_desc = "Créer une page individuelle pour chacun de vos services sur votre site Web peut aider à mettre en valeur votre expertise et faciliter la compréhension";
        $nouvelle_3->date = "Octobre 2019";

        $nouvelles = [
            $nouvelle_3, $nouvelle_2, $nouvelle_1
        ];

        if( $selected_category != 'Toutes les publications' ){
            $data['nouvelles'] = array();
            foreach($nouvelles as $nouvelle) {
                if( $nouvelle->categorie == $selected_category ) {
                    $data['nouvelles'][] = $nouvelle;
                }
            }
        }
        else {
            $data['nouvelles'] = $nouvelles;
        }
        

        

        echo Models\Core\View::display("Blog/nouvelles.php", $data);
    }

    public function details_nouvelle() {

        echo Models\Core\View::display("Blog/details.php");
    }


    public function projets() {

        $projet_1 = new Article();
        $projet_1->id = 1;
        $projet_1->slug = "donald-royer-design";
        $projet_1->categorie = "Portfolio";
        $projet_1->title = "Donald Royer Design";
        $projet_1->preview_image = "/medias/images/portfolio/clients/donaldroyerdesign2022.jpg";
        $projet_1->preview_desc = "Designer expérimenté pour vos logos ou projets artistiques";
        $projet_1->date = "Décembre 2021";

        $projet_2 = new Article();
        $projet_2->id = 2;
        $projet_2->slug = "eugene-laplante";
        $projet_2->categorie = "Portfolio";
        $projet_2->title = "Eugène Laplante Service-conseils";
        $projet_2->preview_image = "/medias/images/portfolio/clients/eugene-laplante-thumb-450x300.jpg";
        $projet_2->preview_desc = "Service-conseils pour vos projets de construction";
        $projet_2->date = "Avril 2019";

        $projet_3 = new Article();
        $projet_3->id = 3;
        $projet_3->slug = "le-gaboteur";
        $projet_3->categorie = "Portfolio";
        $projet_3->title = "Le Gaboteur";
        $projet_3->preview_image = "/medias/images/portfolio/clients/gaboteur2022.jpg";
        $projet_3->preview_desc = "Journal francophone à Terre-Neuve et Labrador";
        $projet_3->date = "Septembre 2022";

        $data['projets'] = [
            $projet_1, $projet_2, $projet_3
        ];

        echo Models\Core\View::display("Blog/projets.php", $data);
    }

    public function details_projet() {
    }



    public function donald() {

        $projet = new Article();
        $projet->id = 1;
        $projet->slug = "donald-royer-design";
        $projet->categorie = "Portfolio";
        $projet->title = "Donald Royer Design";
        $projet->preview_image = "/medias/images/portfolio/clients/donaldroyerdesign2022.jpg";
        $projet->preview_desc = "Designer expérimenté pour vos logos ou projets artistiques";
        $projet->date = "Décembre 2021";

        $data['projet'] = $projet;

        echo Models\Core\View::display("Blog/projet.php", $data);
    }
}