<?php

namespace Models\Entities;

class Timesheet extends \Models\Core\Entity{

    // table:publications
    public $id;
    public $year;
    public $month;
    public $content;

    static public $db_table = 'timesheet_csv';

            
    public function __construct($data = []) {
        $this->fill($data);
    }
    

    protected function _fields() {
        return ["id", "year", "month", "content"];
    }


}