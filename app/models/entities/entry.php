<?php

namespace Models\Entities;

// DB structure
// (table: Submissions)
// id (int)
// visit_id (int)
// page (varchar)
// form (varchar)
// form_data (text)
// csrf_token (varchar35)

class Entry {


    static function save($form_data) {
        $data = [
            'visit_id' => "99999",
            'form_data' => serialize($form_data)
        ];
        $id = Database::query()->insert ('form_submission', $data);
        return $id;
    }
}