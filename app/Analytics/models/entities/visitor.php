<?php

namespace Models\Entities;

use Models\Core\Database;
use BouletAP\Tools\Cookies;

class Visitor extends \Models\Core\Entity {

    public $id;
    public $session_id;
    public $cookie_id;
    public $fingerprint;
    public $user_agent;
    public $ip_address;
    public $screen_info;
    public $data;

    public $is_first_visit = false;
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


    static public function init() {

        $cookie = Cookies::find('user_token');
        $session = session_id();

        $visitor_data = Database::query()
                            ->where('cookie_id', $cookie)
                            ->orWhere('session_id', $session)
                            ->orderBy('id', "DESC")
                            ->get ('visitors');

        if( empty($visitor_data) ) {
            $visitor = Visitor::init_new();
            $visitor->is_fresh = true;
        }
        else {
            $visitor = Visitor::hydrate($visitor_data[0]);

            // make sure the cookie isnt altered before next visit
            $cookie = Cookies::find('user_token');
            $real_cookie_value = $visitor->cookie_id;
            if( $cookie != $real_cookie_value ) {
                Cookies::add('user_token', $real_cookie_value, 3600*24*180);
            }
        }

        return $visitor;
    }

    static function init_new() {

        $session_id = session_id();
        $cookie_token = Models\Core\Auth::hash_password($session_id, time());
        Cookies::add('user_token', $cookie_token, 3600*24*180);

        $visitor = new Visitor();
        $visitor->session_id = $session_id;
        $visitor->cookie_id = $cookie_token;
        $visitor->user_agent = $$_SERVER['HTTP_USER_AGENT'];
        $visitor->ip_address = $$_SERVER['REMOTE_ADDR'];
        $visitor->fingerprint = "";
        $visitor->screen_info = "";
        $visitor->data = "";
        $visitor->save();

        return $visitor;
    }

}