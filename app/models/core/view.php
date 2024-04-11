<?php

namespace Models\Core;

class View {


    static public function display($view, $data = array()) {

        ob_start();
        include(APP_PATH . "/" . $view);
        $content = ob_get_clean();

        ob_start();
        include(APP_PATH . "/Pages/views/_layout.php");
        $layout = ob_get_clean();

        $page = str_replace('{{PAGE_CONTENT}}', $content, $layout);
        return $page;
    }

    
}


