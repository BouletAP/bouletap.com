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

        $nouvelles = Article::get_all();

        // remove private posts
        if( !\Models\Core\Auth::user_can('admin_duty') ) {
            foreach($nouvelles as $key => $nouvelle) {
                if( !empty($nouvelle->private) ) {
                    unset($nouvelles[$key]);
                }
            }            
        }

        $types = [];          
        foreach( $nouvelles as $item ) {
            $cats = explode(', ', $item->categories);
            $types = array_unique (array_merge($types, $cats) );
        }
        
        $categories = [];
        foreach( $types as $type ) {
            $key = \BouletAP\Tools\Stringz::createSlug($type);
            $categories[$key] = $type;
        }

        // sort array + tweak to insert empty key as first position
        asort($categories);
        $categories = array_reverse($categories, true);
        $categories[''] = 'Toutes les publications';
        $categories = array_reverse($categories, true);        
        return $categories;



        // $output = [
        //     'publications' => 'Toutes les publications', 
        //     'cheatsheets' => 'Aide-mémoire',
        //     'nouvelles' => 'Nouvelles', 
        //     'projets' => 'Projets', 
        //     'trucs-et-astuces' => 'Trucs et Astuces', 
        // ];
        // return $output;
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