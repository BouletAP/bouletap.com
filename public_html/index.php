<?php
    require_once __DIR__ . '/../app/bootstrap.php';
    
    Tracking::lifecycle_start();
    
    require_once __DIR__ . '/../app/routes.php';
    $page = Routes::run();

    // les requetes ajax dont envoyées directement dans le fichier de traitement
    if( $page == 'ajax.php' ) {
        if( !empty($_POST['request_type']) ) {
            include(__DIR__ . "/" . $page);
            die();
        }
        else {
            $page = '404.php';
        }
    }

    
    include(__DIR__ . "/template-parts/layouts/layout-header.php");
    include(__DIR__ . "/" . $page);
    include(__DIR__ . "/template-parts/layouts/layout-footer.php");


    Tracking::lifecycle_end();
?>