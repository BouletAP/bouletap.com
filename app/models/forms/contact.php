<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Fields\Email;
use \BouletAP\Forms\Fields\TextArea;
use \BouletAP\Forms\Validations\Required;

class ContactForm extends Forms {
	
	public $name = 'contact-form';

	public function fields() {           

        $contactType = new Hidden('contact_form');
        $contactType->setValue( 'general' );


        $courriel = new Email('courriel');
        $courriel->addAttribute( 'placeholder', 'Votre courriel' );
        $courriel->addValidation( new Required );
        
        $phone = new Text('phone');
        $phone->addAttribute( 'placeholder', 'Téléphone' );

        
        $full_name = new Text('full_name');
        $full_name->addAttribute( 'placeholder', 'Votre nom' );
        
        
        $subject = new Text('subject');
        $subject->addAttribute( 'placeholder', 'Sujet du message' );

        $message = new TextArea('message');
        $message->addAttribute( 'placeholder', 'Entrez votre message' );
        $message->addValidation( new Required );
        
        $this->addFields($courriel, $full_name, $phone, $subject, $message);           
    }

}