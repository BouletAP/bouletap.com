<?php

use Models\Core\Auth;
use Models\Services\Analytics;


use Models\Entities\Visitor;
use Models\Entities\Visitor2;
use Models\Entities\Visit;


class AnalyticsController {
    

    public function dashboard() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 



        $last_visits = Visit::find_lastest(10);
        //echo '<pre>'; print_r($last_visits); echo '</pre>'; die();

        $visitors = [];
        foreach($last_visits as $visit) {
            if( empty($visitors[$visit->visitor_id]) ) {
                $visitors[$visit->visitor_id] = Visitor2::find('id', $visit->visitor_id);
            }
        }

        // foreach($visitors as $visitor) {
        //     echo '<pre>'; print_r($visitor); echo '</pre>'; 
        //     $infos = $visitor->getAllUAInfos();
        //     echo 'infos<pre>'; print_r($infos); echo '</pre>';
        // }
        // die();

        // $visitors[$last_visits[0]->visitor_id]->getDevice();
        // echo '<pre>'; print_r($visitors[$last_visits[0]->visitor_id]); echo '</pre>'; 
        // echo '<pre>'; print_r($last_visits[0]); echo '</pre>'; die();

        $data = [
            "last_visits" => $last_visits,
            "visitors" => $visitors
        ];
        echo Models\Core\View::display("Analytics/views/dashboard.php", $data);
    }



    public function ajax_save_appdata() {
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
    
}