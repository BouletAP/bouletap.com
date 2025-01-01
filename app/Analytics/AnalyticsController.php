<?php

use Models\Core\Auth;
use Models\Services\Analytics;


use Models\Entities\Visitor;
use Models\Entities\Visit;


class AnalyticsController {
    
    public function __construct() {
        //Analytics::i()->is_trackable = false;
    }

    public function dashboard() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 

        $last_visits = Visit::find_lastest(3);
        echo '<pre>'; print_r($last_visits); echo '</pre>'; 
        $top_pages = Visit::find_pages(10);
        $last_visits = Visit::find_lastest(10);

        //echo '<pre>'; print_r($last_visits); echo '</pre>'; die();

        $visitors = [];
        foreach($last_visits as $visit) {
            if( empty($visitors[$visit->visitor_id]) ) {
                $visitors[$visit->visitor_id] = Visitor::find('id', $visit->visitor_id);
            }
        }

        // Top Pages (PageName, Visits, AVGTimeSpent, BounceRate)
        // Last Visit (IP/VisitorID, PageViewed, DateTime)
        // Last Visitor (IP, Device, Resolution)
        $data = [
            "top_pages" => $top_pages,
            "last_visits" => $last_visits,
            "visitors" => $visitors
        ];
        echo Models\Core\View::display("Analytics/views/dashboard.php", $data);
    }



    public function ajax_new_visitor() {
        $visitor_id = (int)$_POST['t'];

        if( Analytics::i()->getId() != $visitor_id ) 
            return false;

        // width ; height ; colorDepth ; pixelDepth 
        $unsecured_infos = explode(';', $_POST['i']);
        $screen_data = array_map('intval', $unsecured_infos); 
        $screen_info = "{$screen_data[0]};{$screen_data[1]};{$screen_data[2]};{$screen_data[3]}";

        $data = ['screen_info' => $screen_info];
        Analytics::i()->visitor->update($data); 
        die();
    }


    /*
    * 1. Page OnLoad: Create visit info + hash. Print Hash for Interval
    * 2. Interval: Update visit info with VisitData
    * 3. OnActionableKPI: Update visit info with ActionData
    **/
    public function ajax_update_visit() {

        // pid
        // y

        $visit = Visit::find('id', (int)$_POST['pid']);
        $visit->updated = time();
        $actions = $visit->getActions();
        

        $action = new stdClass();
        $action->type = "browse";
        $action->y_offset = (int)$_POST['y'];
        $action->timestamp = time();

        $actions []= $action;
        $visit->actions = $actions;
        $visit->save();        
    }
    
}