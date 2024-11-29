<?php

use Models\Core\Auth;

class AnalyticsController {
    
    public function __construct() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 
    }

    public function dashboard() {


        echo 'dashboard<pre>'; print_r($_GET); echo '</pre>'; die();

        $data = [
        ];
        echo Models\Core\View::display("Analytics/views/dashboard.php", $data);
    }

    
}