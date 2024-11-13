<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Fields\ImageUpload;
use \BouletAP\Forms\Fields\TextArea;
use \BouletAP\Forms\Validations\Required;

class ManageNews extends Forms {
	
	public $name = 'article-form';

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
        
        $categories = new Text('categories');
        $categories->addAttribute( 'placeholder', 'Catégories' );
        $categories->addValidation( new Required );

        $published = new Text('published');
        $published->addAttribute( 'placeholder', 'Date de publication (automatique si vide)' );


        $is_private = new Text('private');
        $is_private->addAttribute( 'placeholder', 'Inscrire "1" si la nouvelle est privée' );
        
        $this->addFields($image_main, $title, $content, $short_pitch, $categories, $is_private, $published);           
    }

}