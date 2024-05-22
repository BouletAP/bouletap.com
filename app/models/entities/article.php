<?php
// used for news, cheatsheet, guide and projects

namespace Models\Entities;

use Models\Core\Database;

class Article {

    // table:publications
    public $id;
    public $slug;
    public $category;
    public $title;
    public $preview_image;
    public $preview_desc;
    public $image;
    public $content;
    public $published;
    public $private;
    
    public $categorie;
    public $date;

    public $data;

    public function getData($key) {
        return !empty($this->data[$key]) ? $this->data[$key] : false;
    }


    static function create($form_data) {
        $form_data['id'] = Database::query()->insert ('publications', $form_data);

        $article = new Article();
        $article->data = $form_data;
        return $article;
    }

    public function update() {

        $id = $this->getData('id');        
        if(!$id) return false; 
        
        $db = Database::query();
        $db->where('id', $id);
        $db->update ('visits', $this->data);
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
}