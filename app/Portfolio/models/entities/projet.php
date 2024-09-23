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
    public $date_publication;
    public $type_projet;
    public $nom_client;

    public $image;
    public $images_1;
    public $images_2;
    public $images_3;

    public $images_1_desc;
    public $images_2_desc;
    public $images_3_desc;

    

    protected function publication_metas_fields() {
        return [
            "url", "concept", "defi", "solution", 
            "overview", 
            "short_pitch", "sales_pitch", "date_publication", "type_projet", "nom_client", "image", 
            "images_1", "images_2", "images_3", "images_1_desc", "images_2_desc", "images_3_desc"];
    }



    static public function get_all() {
        Database::query()->where('type', 'Projets');
        return parent::get_all();
    }

    public function delete() {

        if( !empty($this->image) ) {
            unlink(UPLOAD_PATH . $this->image);
        }

        if( !empty($this->images) && is_array($this->images) ) {
            foreach($this->images as $image) {
                unlink(UPLOAD_PATH . $image);
            }
        }

        parent::delete();
    }
}