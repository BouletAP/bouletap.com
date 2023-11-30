<?php

namespace BouletAP;

class Database {

    static $instance = false;
    private $dbobj;
   
    static public function i() {

        if( !self::$instance ) {
            self::$instance = new self();
            self::$instance->dbobj = new \MysqliDb (DB_HOST, DB_USR, DB_PWD, DB_NAME);
        }       
        
        return self::$instance;
    }

    static function query() {
        $db = self::i();
        return $db->dbobj;
    }
}