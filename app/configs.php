<?php

$env = parse_ini_file('.env');

if( !defined('DB_HOST') ) define('DB_HOST', $env['DB_HOST']);
if( !defined('DB_USR') ) define('DB_USR', $env['DB_USR']);
if( !defined('DB_PWD') ) define('DB_PWD', $env['DB_PWD']);
if( !defined('DB_NAME') ) define('DB_NAME', $env['DB_NAME']);

if( !defined('CURRENT_PHONE_NUMBER') ) define('CURRENT_PHONE_NUMBER', $env['PHONE_NUMBER']);
if( !defined('IS_DEV') ) define('IS_DEV', $_SERVER['REMOTE_ADDR'] == $env['DEV_IP_ADDR']);

if( !defined('APP_PATH') ) define('APP_PATH', __DIR__);
if( !defined('PUBLIC_HTML') ) define('PUBLIC_HTML', __DIR__ . "/..");
if( !defined('UPLOAD_PATH') ) define('UPLOAD_PATH', PUBLIC_HTML."/uploads/");