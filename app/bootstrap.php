<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once __DIR__ . '/configs.php';
require_once __DIR__ . '/../vendor/autoload.php';


// load db
require_once __DIR__ . '/models/database.php';

// load tracking
require_once __DIR__ . '/models/tracking.php';