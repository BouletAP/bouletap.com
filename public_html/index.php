<?php

    require_once __DIR__ . '/../app/bootstrap.php';      

    use Models\Services\Analytics;

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    session_start();

        

    Analytics::start();
    require_once __DIR__ . '/../app/controller.php';    
    Analytics::end();