<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Fields\ImageUpload;
use \BouletAP\Forms\Fields\TextArea;
use \BouletAP\Forms\Validations\Required;

class PublicationForm extends Forms {
	
	public $name = 'publication-form';

	public function fields() {           
       

        $image_main = new ImageUpload('image', UPLOAD_PATH, "articles/");


        $title = new Text('title');
        $title->addAttribute( 'placeholder', "Titre de l'article" );
        $title->addValidation( new Required );


        $content = new TextArea('content');
        $content->addAttribute( 'placeholder', 'Entrez le contenu' );
        $content->addValidation( new Required );

        $short_pitch = new Text('short_pitch');
        $short_pitch->addAttribute( 'placeholder', 'Short pitch' );
        $short_pitch->addValidation( new Required );
        
        $this->addFields($image_main, $title, $content, $short_pitch);           
    }

}