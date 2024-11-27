<?php

require_once __DIR__ . '/models/entities/timesheet.php';
require_once __DIR__ . '/models/forms/uploadreport.php';
require_once __DIR__ . '/models/services/ProjectLine.php';
require_once __DIR__ . '/models/services/ProjectTimesheet.php';

use Models\Core\Auth;
use Models\Core\Database;

use Models\Entities\Timesheet;



class TimeSheetController {
    
    public function __construct() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 
    }


    public function upload() {
        //echo '<pre>'; print_r($_FILES); echo '</pre>'; 

        // get content of the file
        $upload_form = new Models\Forms\UploadReport();
        $report_content = file_get_contents($_FILES['report']['tmp_name']);
        //echo '<pre>'; print_r($report_content); echo '</pre>'; die();

        // select the MM/YYYY uploaded
        $filename = pathinfo($_FILES['report']['name'], PATHINFO_FILENAME);
        $name_info = explode("-", $filename);
        $months = \BouletAP\Tools\Dates::months();
        $months_en = \BouletAP\Tools\Dates::months('en');
        $year = false;
        $month = false;
        for($i=0; $i<count($name_info); $i++) {
            $info = trim($name_info[$i]);
            if( is_numeric($info) ) {
                $year = $info;
            }
            elseif( in_array($info, $months) ) {
                $month = array_search($info, $months)  +1;
            }
            elseif( in_array($info, $months_en) ) {
                $month = array_search($info, $months_en) +1;
            }
        }        
        // check database for existing entry
        $current_timesheet = new Timesheet();
        if( !empty($year) && !empty($month) ) {
            $current_timesheet = Timesheet::get_by_time($year, $month);
        }
        
        // update or create entry
        $current_timesheet->year = !empty($year) ? $year : date('Y');
        $current_timesheet->month = !empty($month) ? $month : date('m');
        $current_timesheet->content = $report_content;
        $current_timesheet->save();

        // redirect to report dashboard
        header("Location: /admin/timesheet");
        return;
    }


    public function index() {


        $upload_form = new Models\Forms\UploadReport();

        $sheets = Timesheet::get_all();
        $projects = new Models\Services\ProjectTimesheet($sheets);

        
        $data = [
            'ds'    => date("Y-m-d", time()-(3600*24*14)),
            'de'    => date("Y-m-d", time()),
            'p'    => "*",
            'report' => false,
            'list-projects' => $projects->get_projects(),
            'upload_form' => $upload_form
        ];

        echo Models\Core\View::display("TimeReporting/views/timesheet-index.php", $data);
    }


    
    public function details() {

        $ds = !empty($_GET['ds']) ? $_GET['ds'] : date("Y-m-d", time()-(3600*24*14));
        $de = !empty($_GET['de']) ? $_GET['de'] : date("Y-m-d", time());
        $p = !empty($_GET['p']) ? $_GET['p'] : "*";

        $start_filter = new \DateTime($ds);
        $end_filter = new \DateTime($de);

        $upload_form = new Models\Forms\UploadReport();
        
        $sheets = Timesheet::get_all();
        $projects = new Models\Services\ProjectTimesheet($sheets);
        $listProjects = $projects->get_projects();
        
        $projects->set_filter_project($p);
        $projects->set_filter_date($start_filter, $end_filter);

        $listTasks = $projects->getReport();

        
        $dateStart = "";
        $dateDelivered = "";
        $totalTasks = 0;
        $i=0;
        foreach( $listTasks as $day => $tasks ) {
            $i++;
            if( $i == 1 ) $dateStart = $day;
            if( $i == count($listTasks) ) $dateDelivered = $day;
            $totalTasks += count($tasks);
        }

        
        $data = [
            'ds'    => $ds,
            'de'    => $de,
            'p'    => $p,
            'list-projects' => $listProjects,
            'upload_form' => $upload_form,
            'report' => true,
            'list-tasks' => $listTasks,
            'date-start' =>$dateStart,
            'date-delivered' =>$dateDelivered,
            'total-tasks' =>$totalTasks,
            'time-total' =>$projects->sumTotalTime($listTasks),
            'time-included' =>$projects->sumIncludedTime($listTasks),
            'time-billable' =>$projects->sumBillableTime($listTasks)
        ];


        echo Models\Core\View::display("TimeReporting/views/timesheet-index.php", $data);
    }



    

}