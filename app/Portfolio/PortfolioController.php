<?php

use Models\Entities\Article;
use Models\Entities\Projet;

class PortfolioController {



    public function projets() {

        // $projet_1 = new Article();
        // $projet_1->id = 1;
        // $projet_1->slug = "donald-royer-design";
        // $projet_1->categorie = "Portfolio";
        // $projet_1->title = "Donald Royer Design";
        // $projet_1->preview_image = "/medias/images/portfolio/clients/donaldroyerdesign2022.jpg";
        // $projet_1->preview_desc = "Designer expérimenté pour vos logos ou projets artistiques";
        // $projet_1->date = "Décembre 2021";

        // $projet_2 = new Article();
        // $projet_2->id = 2;
        // $projet_2->slug = "eugene-laplante";
        // $projet_2->categorie = "Portfolio";
        // $projet_2->title = "Eugène Laplante Service-conseils";
        // $projet_2->preview_image = "/medias/images/portfolio/clients/eugene-laplante-thumb-450x300.jpg";
        // $projet_2->preview_desc = "Service-conseils pour vos projets de construction";
        // $projet_2->date = "Avril 2019";

        // $projet_3 = new Article();
        // $projet_3->id = 3;
        // $projet_3->slug = "le-gaboteur";
        // $projet_3->categorie = "Portfolio";
        // $projet_3->title = "Le Gaboteur";
        // $projet_3->preview_image = "/medias/images/portfolio/clients/gaboteur2022.jpg";
        // $projet_3->preview_desc = "Journal francophone à Terre-Neuve et Labrador";
        // $projet_3->date = "Septembre 2022";

        // $data['projets'] = [
        //     $projet_1, $projet_2, $projet_3
        // ];

        // $data['categories'] = [
        //     'publications' => 'Tous les projets', 
        //     'wordpress' => 'WordPress',
        //     'php' => 'PHP', 
        //     'autres' => 'Autres'
        // ];


        //if( IS_DEV ) {
            $projets = Projet::get_all();

            $categories = ['publications' => 'Tous les projets'];
            foreach( $projets as $projet ) {
                $cats = explode(', ', $projet->type_projet);
                $categories = array_unique (array_merge($categories, $cats) );
            }
            $categories['autres'] = 'Autres';            
            $data['categories'] = $categories;
        //}

        //if( IS_DEV ) {
            $data['projets'] = $projets;
            //echo '<pre>'; print_r($projets); echo '</pre>'; die();
        //}

        echo Models\Core\View::display("Portfolio/projets.php", $data);
    }

    public function details_projet($slug) {

        $projet = Projet::get_by('slug', $slug);
        if( empty($projet) ) {
            header("Location: /portfolio/");
            die();
        }
        $projet = $projet[0];
        
        $data['projet'] = $projet;
        //echo '<pre>'; print_r($projet); echo '</pre>'; die();
        echo Models\Core\View::display("Portfolio/projet.php", $data);
    }

}