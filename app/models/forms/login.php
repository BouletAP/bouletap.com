<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Hidden;
use \BouletAP\Forms\Fields\Email;
use \BouletAP\Forms\Fields\Password;
use \BouletAP\Forms\Validations\Required;

class LoginForm extends Forms {
	
	public $name = 'login-form';

	public function fields() {           

        $formHoney = new Hidden('login_form');
        $formHoney->setValue( 'general' );


        $courriel = new Email('courriel');
        $courriel->addAttribute( 'placeholder', 'Votre courriel' );
        $courriel->addValidation( new Required );
        
        
        $password = new Password('password');
        $password->addAttribute( 'placeholder', 'Votre mot de passe' );
        $password->addValidation( new Required );
        
        
        $this->addFields($formHoney, $courriel, $password);           
    }

}