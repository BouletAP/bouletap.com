<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Validations\Required;

class AuditSEO extends Forms {
	
	public $name = 'seo-audit-form';

	public function fields() {           

        $contactType = new Hidden('auditseo');
        $contactType->setValue( 'general' );


        $courriel = new Text('seoaudit1_courriel');
        $courriel->addAttribute( 'placeholder', 'Votre courriel' );
        $courriel->addValidation( new Required );

        $website = new Text('seoaudit1_website');
        $website->addAttribute( 'placeholder', 'https://' );
        $website->addValidation( new Required );
        
        $this->addFields($courriel, $website);           
    }
}