<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once __DIR__ . '/app/bootstrap.php';      

use Models\Services\Analytics;


Analytics::start();
require_once __DIR__ . '/app/controller.php';    
Analytics::end();