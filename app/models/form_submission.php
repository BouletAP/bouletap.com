<?php

// DB structure
// (table: form_submission)
// id (int)
// visit_id (int)
// form_id (varchar50)
// form_data (text)
// csrf_token (text)

class Form_submission {


    static function save($form_data) {
        $data = [
            'visit_id' => "99999",
            'form_data' => serialize($form_data)
        ];
        $id = Database::query()->insert ('form_submission', $data);
        return $id;
    }
}