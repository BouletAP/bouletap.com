<?php

namespace Models\Services;

class ProjectTimesheet {

    public $sheets = false;
    
    public $lines = [];

    public $filter_ds;
    public $filter_de;
    public $filter_project;


    public function __construct($sheets) {

        $this->sheets = $sheets;

        foreach($sheets as $sheet) {
            $this->fill_lines_from_sheet($sheet); 
        }
        
    }

    function get_projects() {
        $projects = [];
        foreach( $this->lines as $line) {
            $projects[$line->project] = $line->project;
        }
        return $projects;
    }


    
    function fill_lines_from_sheet($sheet) {
        
        $date = false;
        $lines = explode(PHP_EOL, $sheet->content);
        foreach( $lines as $key => $line ) {

            // skip title line
            if( $key === 0 ) continue;

           
            $data = str_getcsv($line);

            // IF LINE IS NEW DAILY DATA
            if( empty($data[1]) && empty($data[2])) {
                // daily meta line
                $date = $this->get_new_date_from_line($sheet, $data);
            }
            else {
                // project line
                $project_line = $this->build_project_line($date->getTimestamp(), $data);
                $this->lines []= $project_line;
            }          
            
        }
    }

    function get_new_date_from_line($sheet, $line) {
        $year = $sheet->year;
        $month = $sheet->month;

        $day = (int)$line[0];
        return new \DateTime("$year-$month-$day");
    }
    
    
    // LINE FORMAT
    // [0] => Tâche // DATE
    // [1] => Début
    // [2] => Fin
    // [3] => Projet
    // [4] => Facturable
    // [5] => Type
    // [6] => Total   // SOMME
    // [7] => 12:08   // SOMME
    function build_project_line($current_timestamp, $line) {

        $project_line = new ProjectLine();
        $project_line->timestamp = $current_timestamp;
        $project_line->task = $line[0];
        $project_line->timestart = $line[1];
        $project_line->timeend = $line[2];
        $project_line->set_project($line[3]);
        $project_line->set_billable_ratio($line[4]);
        $project_line->type = $line[5];

        return $project_line;
    }


    function set_filter_project($p) {
        $this->filter_project = $p;
    }
    function set_filter_date($s, $e) {
        $this->filter_ds = $s;
        $this->filter_de = $e;
    }


    function getReport() {
        $output = [];
        $report_lines = $this->get_lines_for_report();

        // build daily task report
        foreach( $report_lines as $line ) {
            
            if( !isset($output[$line->timestamp]) ) {
                $output[$line->timestamp] = [];
                $output[$line->timestamp] []= $line;
            }
            else {
                $output[$line->timestamp] []= $line;
            }
        }

        ksort($output);

        foreach($output as $key => $value) {
            $daily = $output[$key];
            $date = strtolower(date('F d, Y', $key));
            $month_en = strtolower(date('F', $key));


            // traduction du mois en FR...
            $months_fr = \BouletAP\Tools\Dates::months();
            $months_en = \BouletAP\Tools\Dates::months('en');
            $month_index = array_search($month_en, $months_en);
            $month_fr = $months_fr[$month_index];
            $date = ucfirst(str_replace($month_en, $month_fr, $date));
            
            $output[$date] = $daily;
            unset($output[$key]);
        }


        return $output;
    }

    function get_lines_for_report() {
        $report_lines = [];
        foreach($this->lines as $line) {

            // validation du projet
            if( $this->filter_project == "*" || $line->project == $this->filter_project ) {
                if( $line->timestamp >= $this->filter_ds->getTimestamp() && $line->timestamp <= $this->filter_de->getTimestamp() ) {
                    $report_lines []= $line;
                }
            }
        }
        return $report_lines;
    }

    // type can be "total, included or billable"
    function sumTime($listTasks, $type = "total") {
        $totalMinutes = 0;
        foreach( $listTasks as $tasks ) {
            foreach($tasks as $task) {
                $time = $task->getTime();
                $time = explode(':', $time);
                $h = $time[0];
                $m = $time[1];
                $taskMinutes = $m + ($h * 60);
                
                if( $type == "included" && $task->billable_ratio !== 1) {
                    $totalMinutes += $taskMinutes;
                }
                elseif( $type == "billable" && $task->billable_ratio === 1 ) {
                    $totalMinutes += $taskMinutes;
                }
                elseif( $type == "total") { 
                    $totalMinutes += $taskMinutes;
                }                
            }
        }

        $output = false;
        if( $totalMinutes > 0 ) {
            $h = str_pad(floor($totalMinutes/60), 2, "0", STR_PAD_LEFT);
            $m = str_pad($totalMinutes%60, 2, "0", STR_PAD_RIGHT);
            $output = "{$h}:{$m}";
        } 
        return $output;
    }



    function sumTotalTime($listTasks) {
        return $this->sumTime($listTasks, "total");
    }

    function sumBillableTime($listTasks) {
        return $this->sumTime($listTasks, "billable");
    }

    function sumIncludedTime($listTasks) {
        return $this->sumTime($listTasks, "included");
    }
}