<?php

namespace Models\Entities;

use Models\Core\Database;

class Visitor2 extends \Models\Core\Entity {

    public $id;
    public $session_id;
    public $cookie_id;
    public $fingerprint;
    public $user_agent;
    public $ip_address;
    public $screen_info;
    public $data;

    static public $db_table = 'visitors';

    public function __construct($data = []) {
        $this->fill($data);
    }
    

    static protected function _fields() {
        return ["id", "session_id", "cookie_id", "fingerprint", "user_agent", "ip_address", "screen_info", "data"];
    }

    public function getAllUAInfos() {
        require_once(__DIR__.'/../vendor/BrowserDetection.php');

        $Browser = new \foroco\BrowserDetection();
        $result = $Browser->getAll($this->user_agent);
        //echo '<pre>'; print_r($result); echo '</pre>'; die();
        return $result;
    }

    public function getDevice() {
        require_once(__DIR__.'/../vendor/BrowserDetection.php');

        $Browser = new \foroco\BrowserDetection();
        $result = $Browser->getAll($this->user_agent);

        $output = $result['device_type'];
        if( $output == 'unknown' ) {
            if( strpos($this->user_agent, 'Googlebot') !== false ) {
                $output = "GoogleBot";
            }
        }

        //echo '<pre>'; print_r($result); echo '</pre>'; die();
        return $output;
    }

    public function getBrowser() {
        require_once(__DIR__.'/../vendor/BrowserDetection.php');

        $Browser = new \foroco\BrowserDetection();
        $result = $Browser->getAll($this->user_agent);
        //echo '<pre>'; print_r($result); echo '</pre>'; die();
        return $result['browser_name'];
    }
    
    public function getResolution() {
        $screen_info = explode(";", $this->screen_info);
        if( count($screen_info) > 2 ) {
            return "{$screen_info[0]}x{$screen_info[1]}";
        }
        return "unknown";
    }

}