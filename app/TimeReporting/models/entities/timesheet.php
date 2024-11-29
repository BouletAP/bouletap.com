<?php

namespace Models\Entities;

use Models\Core\Database;

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


    public function getTitle() {
        $months = \BouletAP\Tools\Dates::months();
        $month = isset($months[$this->month - 1]) ? $months[$this->month - 1] : $this->month;
        return $month . " " . $this->year;
    }

    static public function get_by_time($year, $month) {
        $items = Database::query()
            ->where("year", $year)
            ->where("month", $month)
            ->get ('timesheet_csv');

        $output = new self();
        if( !empty($items) ) {
            foreach($items as $item) {
                $output = static::build_from_row($item);
            }
        }
        return $output;
    }

}