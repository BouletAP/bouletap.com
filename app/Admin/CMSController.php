<?php

require_once APP_PATH . '/models/forms/publication.php';
require_once APP_PATH . '/models/entities/article.php';

require_once APP_PATH . '/Portfolio/models/forms/projet.php';
require_once APP_PATH . '/Portfolio/models/entities/projet.php';


use BouletAP\Tools\Cookies;
use BouletAP\Tools\Stringz;
use Models\Core\Auth;
use Models\Core\Database;



use Models\Entities\Publication;


use Models\Entities\Article;
use Models\Entities\Projet;



class CMSController {
    
    public function portfolio_list() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 





        $projets = Projet::get_all();

        //echo 'projets<pre>'; print_r($projets); echo '</pre>'; die();


        $data = [
            'page' => 'portfolio',
            'items' => $projets
        ];

        echo Models\Core\View::display("Admin/views/listing.php", $data);
    }


    public function portfolio_add() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 
        
        $form = new Models\Forms\ProjetForm();

        if( !empty($_POST) && $form->validate() ) {

            $form_values = $form->getValues();

            $form_values['slug'] = Stringz::createSlug($form_values['title']);
            $form_values['type'] = 'Projets';
            $form_values['published'] = time();
            $form_values['private'] = 0;            

            $projet = new Projet($form_values);
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

    public function portfolio_edit($id = false) {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
            die();
        } 

        $id = (int)$id;
        if( $id <= 0 ) {
            header("Location: /admin/portfolio/add");
            die();
        }

        $projet = Projet::get_by('id', $id);
        if( empty($projet) ) {
            header("Location: /admin/portfolio/add");
            die();
        }
        else {
            $projet = $projet[0];
        }

        // echo 'project<pre>'; print_r($projet); echo '</pre>';
        // echo 'EDITING id:<pre>'; print_r($id); echo '</pre>'; die();
        
        $form = new Models\Forms\ProjetForm();
        $form->fill( (array)$projet );

        // if( !empty($_POST) && $form->validate() ) {
        // }

        $data = [
            'portfolio_form' => $form
        ];

        echo Models\Core\View::display("Admin/views/portfolio-add.php", $data);
    }


    public function portfolio_delete($id = false) {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
            die();
        } 

        $id = (int)$id;
        if( $id <= 0 ) {
            header("Location: /admin/portfolio");
            die();
        }

        $projet = Projet::get_by('id', $id);
        if( empty($projet) ) {
            header("Location: /admin/portfolio");
            die();
        }
        else {
            $projet = $projet[0];
        }

        $projet->delete();
        
        header("Location: /admin/portfolio");
        die();
    }

























    // REAL IS ARTICLES MANAGEMENT HERE....
    public function add_publications() {
        
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 


            
        $form = new Models\Forms\PublicationForm();
        if( $form->validate() ) {

            $file_url = '';
            $target_file = UPLOAD_PATH . basename($_FILES["fileToUpload"]["name"]);
            
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    $file_url = "/uploads/". Stringz::createSlug(basename( $_FILES["fileToUpload"]["name"]));
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }


            $title = $form->getField('title')->getValue();
            $content = $form->getField('content')->getValue();

            $form_data = [
                'slug' => Stringz::createSlug($title),
                'title' => $title,
                'category' => 'Nouvelles',
                'content' => $content,
                'preview_desc' => Stringz::word_cut($content, 15),
                'image' => $file_url,
                'preview_image' => '',
                'published' => time(),
                'private' => 0
            ];

            Models\Entities\Article::create($form_data);

        }
        // else {
        //     $output['state'] = "400";
        //     $output['data'] = $form->getErrors('flat');
        // }




        $data = [
            'publication_form' => $form
        ];

        echo Models\Core\View::display("Admin/views/publications.php", $data);
    }

    
}