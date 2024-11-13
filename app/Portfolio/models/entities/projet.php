<?php
// used for news, cheatsheet, guide and projects

namespace Models\Entities;

use Models\Core\Database;

class Projet extends Publication {

    public $url;
    public $concept;
    public $defi;
    public $solution;
    public $overview;
    public $short_pitch;
    public $sales_pitch;
    public $date_publication; // devient "published"
    public $nom_client;
    
    public $type_projet; // changer pour -> "main", "old job", "concept", "collab"
    public $categories; // vraies categories
    public $pastille;
    public $langue;
    
    public $site_mort;
    public $featured;

    //public $image;

    public $image;
    public $images_1;
    public $images_2;
    public $images_3;
    public $images_4;

    public $images_1_desc;
    public $images_2_desc;
    public $images_3_desc;
    public $images_4_desc;
    
    public $date_eol;
    public $tasks_preview;
    public $client_website;
    public $client_desc;

    

    protected function publication_metas_fields() {
        return [
            "url", "concept", "defi", "solution", 
            "overview", 
            "short_pitch", "sales_pitch", "date_publication", "type_projet", "nom_client", "image", 
            "images_1", "images_2", "images_3", "images_4", "images_1_desc", "images_2_desc", "images_3_desc", "images_4_desc",
            "date_eol", "tasks_preview",
            "client_website", "client_desc",
            "categories", "langue", "pastille", "site_mort", "featured"
        ];
    }



    static public function get_all() {
        Database::query()->orderBy("published","Desc");
        Database::query()->where('private', 0, ">=");
        Database::query()->where('type', 'Projets');
        return parent::get_all();
    }

    static public function get_all_trash() {
        Database::query()->where('type', 'Projets');
        Database::query()->where('private', -1);
        return parent::get_all();
    }

    static public function get_by($field, $val) {
        Database::query()->where('type', 'Projets');
        Database::query()->where('private', 0, ">=");
        return parent::get_by($field, $val);
    }

    static public function get_trashed($id) {
        Database::query()->where('type', 'Projets');
        return parent::get_by('id', $id);
    }


    public function trash() {
        $this->private = -1;
        $this->update();
    }

    public function restore() {
        $this->private = 0;
        $this->update();
    }


    public function delete() {

        if( !empty($this->image) ) {
            if( file_exists(UPLOAD_PATH . $this->image) ) {
                unlink(UPLOAD_PATH . $this->image);
            }            
        }

        $images = ["images_1", "images_2", "images_3"];
        foreach($images as $image) {
            if( file_exists(UPLOAD_PATH . $this->$image) ) {
                unlink(UPLOAD_PATH . $this->$image);
            } 
        }

        parent::delete();
    }

    static public function filter_by_type($projets, $type) {
        $output = [];
        foreach( $projets as $projet ) {
            if( strpos($projet->type_projet, $type) !== FALSE ) {
                $output []= $projet;
            }
        }
        return $output;
    }

    public function update_info() {
        

        // categories
        $this->categories = $this->type_projet;

        // published
        
        // [0] Aout
        // [1] 2018
        $publication = explode(" ", $this->date_publication);

        $month = 01;
        $year = $publication[1];

        $months = \BouletAP\Tools\Dates::months();
        foreach($months as $key => $m) {
            if( $m == strtolower($publication[0]) ) {
                $month = $key + 1;
            }
        }     
        $date = new \DateTime($year . "-" . $month . "-01"); 
        $this->published = $date->getTimestamp();

        $this->save();
    }

    /*

    static public function merge_old_project_by($old_project) {
        $project = new Projet();

        $project->title = $old_project->post_title;
        $project->slug = \BouletAP\Tools\Stringz::createSlug($project->title);
        $project->type = 'Projets';
        $project->type_projet = "WordPress, PHP"; 
        $project->published = time();
        $project->private = 1; 

        

        //$project->content
        $project->url = $old_project->METAS->project_website;
        $project->overview = $old_project->METAS->project_vision;

        $liste_defis = [];
        if( !empty($old_project->METAS->project_contributions) ) {
            foreach( $old_project->METAS->project_contributions as $task ) {
                $liste_defis []= $task->task;
            }            
        }
        $project->defi = "- " . implode(PHP_EOL."- ", $liste_defis);
        $project->tasks_preview = $liste_defis;


        $project->nom_client = $old_project->METAS->client_name;
        $project->date_eol = $old_project->METAS->project_eol;
        $project->client_website = $old_project->METAS->client_website;
        $project->client_desc = $old_project->METAS->client_description;

        $project->short_pitch = "";
        $project->sales_pitch = $old_project->METAS->client_description;
        
        $date_project = explode("-", $old_project->METAS->start_date); // 30-08-2017
        $months = \BouletAP\Tools\Dates::months();
        $project->date_publication = ucfirst($months[$date_project[1]-1]) . " " . $date_project[2];
        

        if( !empty($old_project->METAS->image_main) ){
            $img_id = $old_project->METAS->image_main;
            $old_path = $old_project->IMAGES->$img_id;
            $img_name = basename($old_path);

            $fresh_img = self::move_picture($img_name);
            $project->image = $fresh_img;
        }
        
        if( !empty($old_project->METAS->image_gallery) ){

            foreach( $old_project->METAS->image_gallery as $key => $gimage ) {
                $img_id = $gimage->image;
                $old_path = $old_project->IMAGES->$img_id;
                $img_name = basename($old_path);

                $fresh_img = self::move_picture($img_name);
                $pkey = "images_".($key+1);
                $project->$pkey = $fresh_img;
            }
        }
        
        //echo '<pre>'; print_r($project); echo '</pre>'; die();
        return $project;
    }

    static public function move_picture($img_name) {
        $from = UPLOAD_PATH . "old_projects/" . $img_name;
        $to = UPLOAD_PATH . "portfolio/" . $img_name;

        copy($from, $to);

        $url = "portfolio/" . $img_name;
        return $url;
    }*/
}