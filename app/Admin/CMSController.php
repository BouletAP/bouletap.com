<?php

require_once APP_PATH . '/models/forms/publication.php';
require_once APP_PATH . '/models/entities/article.php';


use BouletAP\Tools\Cookies;
use BouletAP\Tools\Stringz;
use Models\Core\Auth;
use Models\Core\Database;

use Models\Entities\Article;



class CMSController {
    

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