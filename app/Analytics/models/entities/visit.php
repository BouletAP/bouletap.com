<?php

namespace Models\Entities;

use Models\Core\Database;

class Visit extends \Models\Core\Entity {

    public $id;
    public $visitor_id;
    public $session_id; // not PHP Session ID, this is a hash for the pageView tracker
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

    static public function find_pages($limit = 10, $offset = 0) {
        $sql = "
            SELECT DISTINCT visitor_id, count(*) as visited, slug, created
            FROM visits
            GROUP BY slug
            ORDER BY visited DESC
        ";
        $results = Database::query()->rawQuery($sql);

        echo 'find_pages<pre>'; print_r($results); echo '</pre>'; die();

        return $results;
        // $visits = static::hydrate_all($results);
        // return $visits;
    }

    static public function find_lastest($limit = 10, $offset = 0) {
       

        $results = Database::query()
                        ->orderBy("created", "DESC")
                        ->get('visits', [$offset, $limit] );

        $visits = static::hydrate_all($results);
        return $visits;
    }

    public function save() {
        if(is_array($this->actions)) {
            $this->actions = serialize($this->actions);
        }
        parent::save();
    }


    public function getDate() {
        return date('Y-m-d H:i:s', $this->created);
    }

    public function getActions() {
        if( empty($this->actions) ) {
            $this->actions = serialize([]);        
        }
        return unserialize($this->actions);  
    }

}