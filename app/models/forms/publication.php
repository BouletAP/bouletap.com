<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Fields\Email;
use \BouletAP\Forms\Fields\TextArea;
use \BouletAP\Forms\Validations\Required;

class PublicationForm extends Forms {
	
	public $name = 'publication-form';

	public function fields() {           
       
        $title = new Text('title');
        $title->addAttribute( 'placeholder', "Titre de l'article" );
        $title->addValidation( new Required );

        // $title = new Text('title');
        // $title->addAttribute( 'placeholder', "Titre de l'article" );
        // $title->addValidation( new Required );

        $content = new TextArea('content');
        $content->addAttribute( 'placeholder', 'Entrez le contenu' );
        $content->addValidation( new Required );
        
        $this->addFields($title, $content);           
    }

}