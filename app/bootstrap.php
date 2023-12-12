<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/configs.php';
require_once __DIR__ . '/../vendor/autoload.php';


// load db
require_once __DIR__ . '/models/database.php';

require_once __DIR__ . '/models/tracking.php';

require_once __DIR__ . '/models/routes.php';

require_once __DIR__ . '/forms/audit_seo.php';


