<?php


require_once APP_PATH . '/Portfolio/models/forms/projet.php';
require_once APP_PATH . '/Portfolio/models/entities/projet.php';


use BouletAP\Tools\Cookies;
use BouletAP\Tools\Stringz;
use Models\Core\Auth;
use Models\Core\Database;

use Models\Entities\Publication;
use Models\Entities\Projet;

class ProjectAdminController {

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
        //$projet = $projet[0];
        return $projet;
    }
    

    
    public function list($show_trash = false) {

        $original_projects = [35, 36, 43, 46, 48, 49];
        // fix date

        $data = [
            'page' => 'portfolio',
            'show_trash' => $show_trash,
            'items' => !$show_trash ? Projet::get_all() : Projet::get_all_trash()
        ];

        //echo '<pre>'; print_r($data); echo '</pre>'; die();
        echo Models\Core\View::display("Portfolio/views/admin-listing.php", $data);
    }


    public function add() {
        
        $form = new Models\Forms\ProjetForm();

        if( !empty($_POST) && $form->validate() ) {

            $form_values = $form->getValues();
            $form_values['slug'] = Stringz::createSlug($form_values['title']);
            $form_values['type'] = 'Projets';
            //$form_values['published'] = time();
            $form_values['private'] = 0;            
 

            $projet = new Projet();
            $projet->fill($form_values);

            // tmp fix for date projet
            $projet->categories = $projet->type_projet;

            // convert date_publication FR (Month Year) to timestamp
            $publication = explode(" ", $projet->date_publication);
            $month = 01;
            $year = $publication[1];
            $months = \BouletAP\Tools\Dates::months();
            foreach($months as $key => $m) {
                if( $m == strtolower($publication[0]) ) {
                    $month = $key + 1;
                }
            }     
            $date = new \DateTime($year . "-" . $month . "-01"); 
            $projet->published = $date->getTimestamp();

            if( $projet->save() ) {
                header('Location: /admin/portfolio');
                die();
            }
        }

        $error = $form->getErrors('flat');


        $data = [
            'portfolio_form' => $form
        ];

        echo Models\Core\View::display("Portfolio/views/admin-manage.php", $data);
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
            
            // tmp fix for info
            $projet->categories = $projet->type_projet;

            // convert date_publication FR (Month Year) to timestamp
            $publication = explode(" ", $projet->date_publication);
            $month = 01;
            $year = $publication[1];
            $months = \BouletAP\Tools\Dates::months();
            foreach($months as $key => $m) {
                if( $m == strtolower($publication[0]) ) {
                    $month = $key + 1;
                }
            }     
            $date = new \DateTime($year . "-" . $month . "-01"); 
            $projet->published = $date->getTimestamp();
            

            if( $projet->save() ) {
                header('Location: /admin/portfolio');
                die();
            }
        }

        $data = [
            'portfolio_form' => $form
        ];

        echo Models\Core\View::display("Portfolio/views/admin-manage.php", $data);
    }


    public function delete($id = false) {

        $projet = $this->_get_valid_project($id);

        // From trashcan? delete project
        if( $projet->private == -1 ) {
            $projet->delete();
        }
        else {
            $projet->trash();
        }
                
        header("Location: /admin/portfolio");
        die();
    }    

    public function restore($id = false) {

        $id = (int)$id;
        $projet = Projet::get_trashed($id);
        if( $id <= 0 || empty($projet) ) {
            header("Location: /admin/portfolio/add");
            die();
        }

        //$projet = $this->_get_valid_project($id);
        $projet->restore();                
        header("Location: /admin/portfolio/trash");
        die();
    }    
    
    /*public function fix_old_info() {

        $projects = Projet::get_all();

        foreach($projects as $project) {
            $project->update_info();
        }

        echo "completed";
    }*/

    public function merge_old_project() {

        // Extracting data and images from zip
        $source = UPLOAD_PATH . "old_projects.zip";
        $destination = UPLOAD_PATH."old_projects/";
        // (done, no rerun) \BouletAP\Tools\Zip::extract($source, $destination, false);

        $data_path = $destination . "_projects_data.json";
        $data = file_get_contents($data_path);
        $projects = json_decode($data);

        //echo '<pre>'; print_r($projects); echo '</pre>'; die();
        //$merged = [47];
        //$project = $projects[47];

        foreach($projects as $project) {
            $p = Projet::merge_old_project_by($project);
            $p->save();
        }
        
        echo "success";
    }

    
}