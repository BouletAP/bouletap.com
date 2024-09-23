<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Fields\Email;
use \BouletAP\Forms\Validations\Required;

use Models\Core\Database;

class AuditSEO extends Forms {
	
	public $name = 'seo-audit-form';

	public function fields() {           

        $contactType = new Hidden('auditseo');
        $contactType->setValue( 'general' );


        $courriel = new Email('courriel');
        $courriel->addAttribute( 'placeholder', 'Votre courriel' );
        $courriel->addValidation( new Required );

        $website = new Text('website');
        $website->addAttribute( 'placeholder', 'https://' );
        $website->addValidation( new Required );
        
        $this->addFields($courriel, $website);           
    }

    public function save_db() {

        $form_data = [
            'courriel' => $this->getField('courriel')->getValue(),
            'website' => $this->getField('website')->getValue()
        ];

        \Models\Entities\Entry::save('audit-seo', $form_data);
    }
}