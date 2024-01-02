<?php

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Validations\Required;

class AuditSEO_2steps extends Forms {
	
	public $name = 'seo-audit-form-2steps';

	public function fields() {           

        $contactType = new Hidden('auditseo');
        $contactType->setValue( 'general' );


        $courriel = new Text('seoaudit2_courriel');
        $courriel->addAttribute( 'placeholder', 'Votre courriel' );
        $courriel->addValidation( new Required );

        $website = new Text('seoaudit2_website');
        $website->addAttribute( 'placeholder', 'https://' );
        $website->addValidation( new Required );
        
        $this->addFields($courriel, $website);           
    }
}