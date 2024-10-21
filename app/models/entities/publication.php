<?php
// used for news, cheatsheet, guide and projects

namespace Models\Entities;

use Models\Core\Database;

class Publication {

    // // table:publications
    public $id;
    public $slug;
    public $type;
    public $title;
    public $content;
    public $published;
    public $private;


    public function __construct($data = []) {
        $this->fill($data);
    }

    public function fill($data = []) {
        $fields = array_merge($this->publication_fields(), $this->publication_metas_fields()) ;
        foreach($fields as $name) {
            $this->$name = isset($data[$name]) ? $data[$name] : $this->$name;
        }
    }

    protected function publication_fields() {
        return ["id", "slug", "type", "title", "content", "published", "private"];
    }
    protected function publication_metas_fields() {
        return [];
    }


    public function save() {
        return empty($this->id) ? $this->create() : $this->update();
    }


    public function create() {
        
        $publication_fields = $this->publication_fields();
        $data = [];
        foreach($publication_fields as $field) {
            $data[$field] = $this->$field;
        }
        $this->id = Database::query()->insert ('publications', $data);

        if( !empty($this->id) ) {
            $publication_metas_fields = $this->publication_metas_fields();
            foreach($publication_metas_fields as $field) {

                $data = [
                    "publication_id" => $this->id,
                    "name" => $field,
                    "value" => serialize($this->$field)
                ];
                Database::query()->insert ('publications_metas', $data);
            }
        }

        return !empty($this->id);
    }

    public function update() {
        
        $publication_fields = $this->publication_fields();
        $data = [];
        foreach($publication_fields as $field) {
            $data[$field] = $this->$field;
        }

        $db = Database::query();
        $db->where('id', $this->id);
        $db->update ('publications', $data);         


        // HOW TO UPDATE METAS (NEW / EXISTING)
        // DELETE ALL OLD METAS AND RECREATE THEM WITH NEW ONES
        Database::query()
            ->where('publication_id', $this->id)
            ->delete('publications_metas');

        $publication_metas_fields = $this->publication_metas_fields();
        foreach($publication_metas_fields as $field) {
            $data = [
                "publication_id" => $this->id,
                "name" => $field,
                "value" => serialize($this->$field)
            ];
            echo '<pre>'; print_r($data); echo '</pre>'; 
            Database::query()->insert ('publications_metas', $data);
        }

        return !empty($this->id);

    }


    static public function get_all() {
        $output = [];
        $items = Database::query()->get ('publications');

        if( !empty($items) ) {
            foreach($items as $item) {
                $publication = new static();

                foreach( $item as $key => $value ) {
                    $publication->$key = $value;
                }


                $metas = Database::query()
                    ->where('publication_id', $publication->id)
                    ->get ('publications_metas');

                if( !empty($metas) ) {
                    foreach( $metas as $meta ) {

                        $name = $meta['name'];
                        $value = unserialize($meta['value']);

                        if( !empty($publication->$name) && !is_array($publication->$name) ) {
                            $publication->$name = [$publication->$name, $value];
                        }
                        elseif(is_array($publication->$name)) {
                            $publication->$name []= $value;
                        }
                        else {
                            $publication->$name = $value;
                        }                        
                    }
                }
          
                $output[] = $publication;
            }
        }

        return $output;
    }

    static public function get_by($field, $val) {
        Database::query()->where($field, $val);
        $output = static::get_all();
        return $output;
    }


    public function delete() {
        
        if( empty($this->id) ) return false;

        Database::query()
            ->where('publication_id', $this->id)
            ->delete('publications_metas');

        Database::query()
            ->where('id', $this->id)
            ->delete('publications');       
        return true;
    }


    // public function update() {

    //     $id = $this->getData('id');        
    //     if(!$id) return false; 
        
    //     $db = Database::query();
    //     $db->where('id', $id);
    //     $db->update ('visits', $this->data);
    // }


    // static public function get_categories() {
    //     $output = [
    //         'publications' => 'Toutes les publications', 
    //         'cheatsheets' => 'Aide-mémoire',
    //         'nouvelles' => 'Nouvelles', 
    //         'projets' => 'Projets', 
    //         'trucs-et-astuces' => 'Trucs et Astuces', 
    //     ];
    //     return $output;
    // }

    // static public function get_keywords() {
    //     $output = [
    //         'html_css' => 'HTML/CSS', 
    //         'javascript' => 'Javascript', 
    //         'php' => 'PHP',
    //         'wordpress' => 'WordPress'
    //     ];
    //     return $output;
    // }
}