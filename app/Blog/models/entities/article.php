<?php
// used for news, cheatsheet, guide and projects

namespace Models\Entities;

use Models\Core\Database;

class Article extends Publication {

    // table:publications
    public $image;
    public $short_pitch;
    public $categories;

    protected function publication_metas_fields() {
        return ["image", "short_pitch", "categories"];
    }
    
    static public function get_all() {
        Database::query()
            ->orderBy("published","Desc")
            ->where('type', 'Articles');
        return parent::get_all();
    }



    public function delete() {

        if( !empty($this->image) ) {
            if( file_exists(UPLOAD_PATH . $this->image) ) {
                unlink(UPLOAD_PATH . $this->image);
            }            
        }
        parent::delete();
    }


    static public function get_categories() {
        $output = [
            'publications' => 'Toutes les publications', 
            'cheatsheets' => 'Aide-mémoire',
            'nouvelles' => 'Nouvelles', 
            'projets' => 'Projets', 
            'trucs-et-astuces' => 'Trucs et Astuces', 
        ];
        return $output;
    }

    static public function get_keywords() {
        $output = [
            'html_css' => 'HTML/CSS', 
            'javascript' => 'Javascript', 
            'php' => 'PHP',
            'wordpress' => 'WordPress'
        ];
        return $output;
    }

    static public function filter_by_category($articles, $category) {
        $output = [];
        foreach( $articles as $item ) {
            if( strpos($item->categories, $category) !== FALSE ) {
                $output []= $item;
            }
        }
        return $output;
    }
}