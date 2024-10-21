<?php

namespace Models\Entities;

// DB structure
// (table: form_entries)
// id (int)
// visit_id (int)
// page (varchar)
// form (varchar)
// form_data (text)
// csrf_token (varchar35)

use Models\Core\Database;

class Entry {


    static function get_last($count = 10) {
        $db = Database::query();
        $db->orderBy("id","Desc");
        $results = $db->get('form_entries', $count);
        return $results;
    }

    static function save($form_id, $form_data) {
        $data = [
            'visit_id' => "99999",
            'form' => $form_id,
            'form_data' => serialize($form_data)
        ];
        $id = Database::query()->insert ('form_entries', $data);
        return $id;
    }

    static public function get_by($field, $val) {
        $db = Database::query();
        $db->where($field, $val);
        $results = $db->get('form_entries', 1);
        if( !empty ($results) ) {
            $entry = new Entry();
            $entry->id = $results[0]['id'];
            $entry->visit_id = $results[0]['visit_id'];
            $entry->page = $results[0]['page'];
            $entry->form = $results[0]['form'];
            $entry->form_data = $results[0]['form_data'];
            $entry->is_read = $results[0]['is_read'];
            $entry->csrf_token = $results[0]['csrf_token'];
            return $entry;
        }
        return false;
    }


    public function read() {
        $db = Database::query();
        $db->where('id', $this->id);
        $db->update('form_entries', ['is_read' => '1']);
        return true;
    }
}