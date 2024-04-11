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

    static function save($form_data) {
        $data = [
            'visit_id' => "99999",
            'form_data' => serialize($form_data)
        ];
        $id = Database::query()->insert ('form_entries', $data);
        return $id;
    }
}