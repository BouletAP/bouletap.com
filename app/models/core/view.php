<?php

namespace Models\Core;

class View {


    static public function display($view, $data = array()) {       

        ob_start();
        include(APP_PATH . "/" . $view);
        $content = ob_get_clean();

        if( \Models\Core\Auth::user_can('admin_duty') ) {
            $notifs = new \Models\Services\Notifications();
            $content .= $notifs->display();
        } 

        ob_start();
        include(APP_PATH . "/Pages/views/_layout.php");
        $layout = ob_get_clean();

        $page = str_replace('{{PAGE_CONTENT}}', $content, $layout);
        return $page;
    }

    
}


