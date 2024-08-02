<?php

use Models\Entities\Article;

class PortfolioController {



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

        $data['categories'] = [
            'publications' => 'Tous les projets', 
            'wordpress' => 'WordPress',
            'php' => 'PHP', 
            'autres' => 'Autres'
        ];
        echo Models\Core\View::display("Portfolio/projets.php", $data);
    }

    public function details_projet() {
    }



    public function donald_royer_design() {

        // $projet = new Article();
        // $projet->id = 1;
        // $projet->slug = "donald-royer-design";
        // $projet->categorie = "Portfolio";
        // $projet->title = "Donald Royer Design";
        // $projet->preview_image = "/medias/images/portfolio/clients/donaldroyerdesign2022.jpg";
        // $projet->preview_desc = "Designer expérimenté pour vos logos ou projets artistiques";
        // $projet->date = "Décembre 2021";

        // $data['projet'] = $projet;



        $projet = new stdClass();
        $projet->title = "Donald Royer Design";
        $projet->url = "https://donaldroyerdesign.com/";
        
        $projet->image_hero = "https://bouletap.com/medias/images/portfolio/clients/donaldroyerdesign2022.jpg";
        $projet->concept = "Lorem ipsum dolor sit amet cotetur adipisicing elit, sed do mod tempor incid idunt u emu sompor incididunt ut labore etdolore emu some the and one tempor";
        $projet->defi = "Lorem ipsum dolor sit amet cotetur adipisicing elit, sed do mod tempor incid idunt u emu sompor incididunt ut labore etdolore emu some the and one tempor";
        $projet->solution = "Lorem ipsum dolor sit amet cotetur adipisicing elit, sed do mod tempor incid idunt u emu sompor incididunt ut labore etdolore emu some the and one tempor";
        
        $projet->overview = "Perferendis repudiandae fugia rchitecto beatae reprederit vitae recus andae debitis facere quidem animi placeat delt maxime cuuntur at volup tatib uod numuam pariatur libero laborum laudantium non. Vitae optio, distinctio earum esse corporis dolorem! arerse. Excepturi quos conse ctetur adipi sicing elit provi dent laud atium voluptas officiis minus rer um aliquid volup tatem ullam beatae nulla amet facere cum que provident.Radiant Studios stands as a distinguished and reputable label, celebrated for its premium offerings that showcase innovation, creativity.";
        
        $projet->overview_1 = [
            "image" => "https://bouletap.com/medias/images/portfolio/donaldroryerdesign.com/preview-free-quote.JPG",
            "desc" => "Formulaire personnalisée de demande de soumission"
        ];

        $projet->overview_2 = [
            "image" => "https://bouletap.com/medias/images/portfolio/donaldroryerdesign.com/portfolio-filters.JPG",
            "desc" => "Présentation du portfolio avec filtrage par type de service"
        ];

        $projet->overview_3 = [
            "image" => "https://bouletap.com/medias/images/portfolio/donaldroryerdesign.com/contact-page.JPG",
            "desc" => "Page contact simple et adaptée à tous les écrans"
        ];
        
        $projet->short_pitch = "Designer expérimenté pour vos logos ou projets artistiques";
        $projet->sales_pitch = "Perferendis repudiandae fugia rchitecto beatae reprederit vitae recus andae debitis facere quidem animi placeat delt maxime cuuntur at volup tatib uod numuam pariatur libero laborum laudantium non. Vitae optio, distinctio earum esse corporis dolorem! arerse. Excepturi quos conse ctetur adipi sicing elit provi dent laud atium voluptas officiis minus rer um aliquid volup tatem ullam beatae nulla amet facere cum que provident.Radiant Studios stands as a distinguished and reputable label, celebrated for its premium offerings that showcase innovation, creativit. Vitae optio, distinctio earum esse corporis dolorem! arerse.";
        
        $projet->date_publication = "Décembre 2020";
        $projet->type_projet = "Portfolio de projets";
        $projet->nom_client = "Donald Royer Design";

        $data['projet'] = $projet;
        echo Models\Core\View::display("Portfolio/projet.php", $data);
    }
}