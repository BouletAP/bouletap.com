<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Fields\TextArea;
use \BouletAP\Forms\Fields\ImageUpload;
use \BouletAP\Forms\Validations\Required;

class ProjetForm extends Forms {
	
	public $name = 'portfolio-form';

	public function fields() {           

        
        $image_main = new ImageUpload('image', UPLOAD_PATH, "portfolio/");
        //$image_main->addValidation( new Required );
        //$image_main->setSize(700, 360);
       
        $title = new Text('title');
        $title->addAttribute( 'placeholder', 'Entrez le nom du projet' );
        $title->addValidation( new Required );

        $url = new Text('url');
        $url->addAttribute( 'placeholder', "Entrez l'URL du site web" );
        $url->addValidation( new Required );
        
        $concept = new TextArea('concept');
        $concept->addAttribute( 'placeholder', 'Décrire le concept' );
        $concept->addValidation( new Required );

        $defi = new TextArea('defi');
        $defi->addAttribute( 'placeholder', 'Décrire le défi' );
        $defi->addValidation( new Required );

        $solution = new TextArea('solution');
        $solution->addAttribute( 'placeholder', 'Décrire la solution' );
        $solution->addValidation( new Required );


        $overview = new TextArea('overview');
        $overview->addAttribute( 'placeholder', 'Overview du projet' );
        $overview->addValidation( new Required );


        $short_pitch = new Text('short_pitch');
        $short_pitch->addAttribute( 'placeholder', 'Short pitch' );
        $short_pitch->addValidation( new Required );

        $sales_pitch = new TextArea('sales_pitch');
        $sales_pitch->addAttribute( 'placeholder', 'Sales pitch' );
        $sales_pitch->addValidation( new Required );


        $date_publication = new Text('date_publication');
        $date_publication->addAttribute( 'placeholder', 'Date de publication' );
        $date_publication->addValidation( new Required );

        $type_projet = new Text('type_projet');
        $type_projet->addAttribute( 'placeholder', 'Type de projet' );
        $type_projet->addValidation( new Required );

        $nom_client = new Text('nom_client');
        $nom_client->addAttribute( 'placeholder', 'Nom du client' );
        $nom_client->addValidation( new Required );

        
        $title->setValue( "Projet de test #" . time() );
        $url->setValue( "https://example.com" );
        $concept->setValue( "Concept de test" );
        $defi->setValue( "Défi de test" );
        $solution->setValue( "Solution de test" );
        $overview->setValue( "My test overview" );
        $short_pitch->setValue( "Small pitch (test)" );
        $sales_pitch->setValue( "A long sales pitch (test)" );
        $date_publication->setValue( "Octobre 2001" );
        $type_projet->setValue( "Type A, B, C, X, Z" );
        $nom_client->setValue( "Entreprise Test inc." );
        
        $this->addFields(
            $image_main,
            $title, $url, 
            $concept, $defi, $solution, 
            $overview, 
            $short_pitch, $sales_pitch, 
            $date_publication, $type_projet, $nom_client
        );           
    }

}