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
    

    // merge layout + page content and print the html
    ob_start();
    include(APP_PATH . "/pages/{$page}");
    $content = ob_get_clean();

    ob_start();
    include(APP_PATH . "/pages/templates/layout.php");
    $layout = ob_get_clean();

    $page = str_replace('{{PAGE_CONTENT}}', $content, $layout);
    echo $page;
?>