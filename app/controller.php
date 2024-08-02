<?php

    use Models\Core\Router;
        
    $page = Router::run();

    // les requetes ajax dont envoyées directement dans le fichier de traitement
    if( $page == 'ajax.php' ) {
        if( !empty($_POST['request_type']) ) {
            include("ajax.php");
            die();
        }
        else {
            $page = '404.php';
        }
    }
    
    // use controller/method dispatch
    if( is_array($page) ) {
        $controller = $page[0];
        $method = $page[1];         
        
        //require_once APP_PATH . '/' . $controller . ".php";

        $system = new $controller();

        if( !empty($page[2]) )  {
            $system->$method($page[2]);
        }
        else {
            $system->$method();
        }

        exit();
    }
    

    // print page content...

    // merge layout + page content and print the html
    ob_start();
    include(APP_PATH . "/Pages/{$page}");
    $content = ob_get_clean();

    ob_start();
    include(APP_PATH . "/Pages/views/_layout.php");
    $layout = ob_get_clean();

    $page = str_replace('{{PAGE_CONTENT}}', $content, $layout);
    echo $page;
    

    
?>