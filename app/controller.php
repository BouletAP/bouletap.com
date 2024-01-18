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
    
    include(PUBLIC_HTML . "/template-parts/layouts/layout-header.php");
    include(PUBLIC_HTML . "/{$page}");
    include(PUBLIC_HTML . "/template-parts/layouts/layout-footer.php");
?>