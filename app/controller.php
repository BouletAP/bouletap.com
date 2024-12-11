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

        $system = new $controller();

        if( !empty($page[2]) )  {
            $args = $page[2][0];
            if( !empty($page[2][1]) ) {
                $args = [$page[2][1], $page[2][1]];
            }

            $system->$method($args);
        }
        else {
            $system->$method();
        }

        exit();
    }
    

    // print page content... merge layout + page content and print the html
    ob_start();
    include(APP_PATH . "/Pages/{$page}");
    $content = ob_get_clean();

    ob_start();
    include(APP_PATH . "/Pages/views/_layout.php");
    $layout = ob_get_clean();

    $page = str_replace('{{PAGE_CONTENT}}', $content, $layout);
    echo $page;
    

    
?>