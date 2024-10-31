<?php

namespace Models\Forms;

use \BouletAP\Forms\Forms;
use \BouletAP\Forms\Fields\Text;
use \BouletAP\Forms\Fields\FileUpload;
use \BouletAP\Forms\Validations\Upload_mimetype;
use \BouletAP\Forms\Validations\Required;

class UploadReport extends Forms {
	
	public $name = 'timereport-upload-form';

	public function fields() {           

        
        $sheet = new FileUpload('image', UPLOAD_PATH, "portfolio/");
        $sheet->addValidation( new Upload_mimetype(['csv']) );
        $sheet->addValidation( new Required );
       
        $year = new Text('year');
        $year->addAttribute( 'placeholder', 'Entrez le nom du projet' );
        $year->addValidation( new Required );
        $year->setValue(time('Y'));

        $month = new Text('month');
        $month->addAttribute( 'placeholder', "Entrez l'URL du site web" );
        $month->addValidation( new Required );
        
        
        $this->addFields(
            $sheet,
            $year, $month
        );           
    }

}