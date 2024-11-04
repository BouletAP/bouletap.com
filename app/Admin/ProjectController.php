<?php


require_once APP_PATH . '/Portfolio/models/forms/projet.php';
require_once APP_PATH . '/Portfolio/models/entities/projet.php';


use BouletAP\Tools\Cookies;
use BouletAP\Tools\Stringz;
use Models\Core\Auth;
use Models\Core\Database;

use Models\Entities\Publication;
use Models\Entities\Projet;

class ProjectController {

    public function __construct() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 
    }

    private function _get_valid_project($id) {
        $id = (int)$id;
        $projet = Projet::get_by('id', $id);
        if( $id <= 0 || empty($projet) ) {
            header("Location: /admin/portfolio/add");
            die();
        }
        $projet = $projet[0];
        return $projet;
    }
    

    
    public function list() {

        $data = [
            'page' => 'portfolio',
            'items' => Projet::get_all()
        ];
        echo Models\Core\View::display("Admin/views/listing.php", $data);
    }


    public function add() {
        
        $form = new Models\Forms\ProjetForm();

        if( !empty($_POST) && $form->validate() ) {

            $form_values = $form->getValues();
            $form_values['slug'] = Stringz::createSlug($form_values['title']);
            $form_values['type'] = 'Projets';
            $form_values['published'] = time();
            $form_values['private'] = 0;            
 

            $projet = new Projet();
            $projet->fill($form_values);

            if( $projet->save() ) {
                header('Location: /admin/portfolio');
                die();
            }
        }

        $error = $form->getErrors('flat');


        $data = [
            'portfolio_form' => $form
        ];

        echo Models\Core\View::display("Admin/views/portfolio-add.php", $data);
    }

    public function edit($id = false) {

        $projet = $this->_get_valid_project($id);
        //echo 'edit<pre>'; print_r($projet); echo '</pre>'; die(); 
    
        $form = new Models\Forms\ProjetForm();
        $form->fill( (array)$projet );
        
        if( !empty($_POST) && $form->validate() ) {

            $form_values = $form->getValues();
            //echo 'form_values<pre>'; print_r($form_values); echo '</pre>'; die();
            $form_values['slug'] = Stringz::createSlug($form_values['title']);

            $projet->fill($form_values);   
            //echo 'edit<pre>'; print_r($projet); echo '</pre>'; die(); 

            if( $projet->save() ) {
                header('Location: /admin/portfolio');
                die();
            }
        }

        $data = [
            'portfolio_form' => $form
        ];

        echo Models\Core\View::display("Admin/views/portfolio-add.php", $data);
    }


    public function delete($id = false) {

        $projet = $this->_get_valid_project($id);

        $projet->delete();
        
        header("Location: /admin/portfolio");
        die();
    }    
}