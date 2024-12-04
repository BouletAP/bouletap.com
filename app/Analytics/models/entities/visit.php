<?php

namespace Models\Entities;

use Models\Core\Database;

class Visit extends \Models\Core\Entity {

    public $id;
    public $visitor_id;
    public $session_id;
    public $slug;
    public $actions;
    public $created;
    public $updated;

    static public $db_table = 'visits';

    public function __construct($data = []) {
        $this->fill($data);
    }
    

    static protected function _fields() {
        return ["id", "visitor_id", "session_id", "slug", "actions", "created", "updated"];
    }


    static public function find_lastest($limit = 10, $offset = 0) {
       

        $results = Database::query()
                        ->orderBy("created", "DESC")
                        ->get('visits', [$offset, $limit] );

        $visits = static::hydrate_all($results);
        return $visits;
    }


    /*

    public function getData($key = '') {
        if( empty($key) ) 
            return $this->data;

        return !empty($this->data[$key]) ? $this->data[$key] : false;
    }
    
    function __construct($data = false) {

        if( $data ) {
            $this->data = $data;            
            $this->current_page = new Page();
            $this->initVisitedPages($this->getData('data'));
        }
        else {
            $this->current_page = new Page();
        }
    }

    public function initVisitedPages($serialized_page_data) {
        if( !empty($serialized_page_data) ) {
            $this->pages_visited = unserialize($serialized_page_data);
        }
    }


    static public function findLastVisit($visitor_id) {

        $last_visit = false;

        $db = Database::query();
        $db->where('visitor_id', $visitor_id);
        $db->orderBy("created","Desc");
        $results = $db->get('visits', 1);
        
        if( !empty ($results) ) {
            $last_visit = new Visit($results[0]);
        }

        return $last_visit;
    }

    static public function initByVisitor($visitor_id) {

        $pageData = "";

        $data = [
            "visitor_id" => $visitor_id,
            "session_id"  => session_id(),
            "data"  => $pageData,
            "created" => time()
        ];        
        $data['id'] = Database::query()->insert ('visits', $data);        

        $visit = new Visit();
        $visit->data = $data;
        return $visit;
    }

    public function update() {

        $id = $this->getData('id');        
        if(!$id) return false; 
        
        $db = Database::query();
        $db->where('id', $id);
        $db->update ('visits', $this->data);
    }

    public function updatePagesVisited() {

        $this->pages_visited []= $this->current_page->getData();
        $this->data['data'] = serialize($this->pages_visited);
    }*/

}