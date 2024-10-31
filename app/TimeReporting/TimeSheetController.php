<?php

require_once __DIR__ . '/models/entities/timesheet.php';

use Models\Core\Auth;
use Models\Core\Database;

use Models\Entities\Timesheet;



class TimeSheetController {
    
    public function __construct() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 
    }


    public function index() {

        // mock
        $projet1 = ["id" => 1, "name" => "Projet 1"];
        $projet2 = ["id" => 2, "name" => "Projet 2"];
        $projet3 = ["id" => 3, "name" => "Projet 3"];
        $projets = [
            (object)$projet1,
            (object)$projet2,
            (object)$projet3
        ];
        //////////////////


        // $timesheet = new Timesheet();
        // $timesheet->year = "2024";
        // $timesheet->month = "02";
        // $timesheet->content = '...';
        // $timesheet->save();

        // $curl = new \BouletAP\Tools\Curl();
        // $curl->post('https://bouletap.com/admin/timesheet/test_curl', ['noauth'=>"2342"]);


        $sheets = Timesheet::get_all();
        // foreach($sheets as $sheet) {
        //     $sheet->delete();
        // }
        echo '<pre>'; print_r($sheets); echo '</pre>'; die();

        
         $data = [
            'list-projects' => $projets
        //     'messages_audit' => $contact_messages['audit-seo'],
        //     'messages_contact' => $contact_messages['contact'],
        //     'visitors' => $visitors
        ];

        echo Models\Core\View::display("TimeReporting/views/timesheet-index.php", $data);
    }


    
    public function details() {


        $task1 = [
            "description" => "task name #" . rand(1, 15) . " golden",
            "totalTime" => "2",
            "getBillableClass" => "billable",
            "getBillableLabel" => "Billable"
        ];

        $taskByDate = [
            "28" => [
                (object)$task1
            ]
        ];


        // mock
        $projet1 = [
            "id" => 1, 
            "name" => "Projet 1",
            "taskList" => [],
            "billable_time" => "2.5",
            "getStartDate" => "28 oct 2024",
            "getDeliveryDate" => "31 oct 2024",
            "total_time" => 15,
            "free_time" => 5,
            "billable_time" => 10,
            "taskByDate" => $taskByDate
        ];


        $projet2 = ["id" => 2, "name" => "Projet 2"];
        $projet3 = ["id" => 3, "name" => "Projet 3"];
        $projets = [
            (object)$projet1,
            (object)$projet2,
            (object)$projet3
        ];

        $data = [
            'list-projects' => $projets,
            'report_name' => "Rapport de test",
            'project_data' => (object)$projet1,
            'display_tasks' => true,
            "tasks-buffering" => false
        ];

        //echo '<pre>'; print_r($data); echo '</pre>'; die();

        echo Models\Core\View::display("TimeReporting/views/timesheet-details.php", $data);
    }



    

}