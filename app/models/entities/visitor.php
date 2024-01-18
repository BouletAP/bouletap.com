<?php

namespace Models\Entities;

// DB structure
// (table: visitors)
// id (int)
// session_id (int)
// user_agent (text)
// fingerprint (varchar)
// cookie_id (varchar)
// new: ip_address (varchar)
// new: screen_size (varchar)
// new: data (text)
use BouletAP\Tools\Cookies;
use Models\Core\Database;

class Visitor {

    // id (int)
    // session_id (int)
    // user_agent (text)
    // fingerprint (varchar)
    // cookie_id (varchar)
    // ip_address (varchar)
    // screen_info (varchar)
    // data (text)
    private $data;
    public $is_fresh = false;


    public function getData($key) {
        return !empty($this->data[$key]) ? $this->data[$key] : false;
    }

    public function update($data) {

        $id = $this->getData('id');        
        if(!$id) return false; 
        
        $db = Database::query();
        $db->where('id', $id);
        $db->update ('visitors', $data);
    }


    static public function init() {

        $visitor_data = self::findByPast();

        if( empty($visitor_data) ) {
            $visitor = Visitor::create();
            $visitor->is_fresh = true;
        }
        else {
            $visitor = new Visitor();
            $visitor->data = $visitor_data[0];

            // make sure the cookie isnt altered before next visit
            $cookie = Cookies::find('user_token');
            $real_cookie_value = $visitor->getData('cookie_id');
            if( $cookie != $real_cookie_value ) {
                Cookies::add('user_token', $real_cookie_value, 3600*24*180);
            }
        }

        return $visitor;
    }  


    static function create() {

        $session_id = session_id();
        $cookie_token = self::hash_token($session_id, time());
        Cookies::add('user_token', $cookie_token, 3600*24*180);

        $data = [
            "session_id" => $session_id,
            "cookie_id"  => $cookie_token,
            "user_agent" => $_SERVER['HTTP_USER_AGENT'],
            "ip_address" => $_SERVER['REMOTE_ADDR'],
            "fingerprint" => "",
            "screen_info" => "",
            "data" => ""
        ];        
        $data['id'] = Database::query()->insert ('visitors', $data);        

        $visitor = new Visitor();
        $visitor->data = $data;
        return $visitor;
    }
    
    // get id by cookie or by session id
    // (else by fingerprint) @todo
    static function findByPast() {

        $cookie = Cookies::find('user_token');
        $session = session_id();

        $db = Database::query();
        $db->where('cookie_id', $cookie);
        $db->orWhere('session_id', $session);
        $results = $db->get ('visitors');

        return $results;
    }    


    
    static function hash_token($pass, $salt = "") {
        $pwd = trim($salt."".$pass);
        $hash = hash('sha256', $pwd);
        return $hash;
    }
}