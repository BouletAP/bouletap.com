<?php
require_once __DIR__ . '/../app/bootstrap.php';


if( $_POST['request_type'] == "kingdata" ) {

    //$tracker = static::i()->get();
    //static::i()->lifecycle_start()

    // width ; height ; colorDepth ; pixelDepth 
    $t = (int)$_POST['t'];
    $unsecured_infos = explode(';', $_POST['i']);
    $info = array_map('intval', $unsecured_infos);
    Tracking::i()->save_frontinfos($t, $info);
}




die();