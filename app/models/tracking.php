<?php

// DB structure
// (table: tracking)
// id (int)
// session_id (int)
// user_agent (text)
// fingerprint (varchar)
// cookie_id (varchar)
// new: ip_address (varchar)
// new: screen_size (varchar)
// new: remote_port (varchar)
// created (int)
// session_funnel (text)
// 

use BouletAP\Tools\Cookies;

class Tracking {
   
    static $instance = false;
    public $tracker_id;
    public $newly_created = false;

   
    static public function i() {

        if( !self::$instance ) {
            self::$instance = new self();            
        }       
        
        return self::$instance;
    }

    // get current tracker or init one
    static function lifecycle_start() {
        $tracker = static::i()->get();

        if( empty($tracker) ) {
            $session_id = session_id();
            $cookie_token = self::hash_token($session_id, time());
            $data = [
                "session_id" => $session_id,
                "user_agent" => $_SERVER['HTTP_USER_AGENT'],
                "fingerprint" => 'n/a',
                "cookie_id" => $cookie_token,
                "ip_address" => $_SERVER['SERVER_ADDR'],
                "remote_port" => $_SERVER['REMOTE_PORT'],
                "created" => time()
            ];

            Cookies::add('user_token', $cookie_token, 3600*24*180);
            $id = Database::query()->insert ('tracking', $data);

            static::i()->newly_created = true;
        }
        elseif( count($tracker) === 1) {
            $id = $tracker[0]['id'];
        }
        else {
            echo 'problem with tracker - multiple values found<pre>'; die();
        }

        static::i()->tracker_id = $id;
    }



    static function lifecycle_end() {
        //echo '<pre>'; print_r(static::i()->tracker_id); echo '</pre>'; die();
    }



    // width ; height ; colorDepth ; pixelDepth 
    function save_frontinfos($tracker_id, $infos) {
        $screen_info = "{$infos[0]};{$infos[1]};{$infos[2]};{$infos[3]}";

        $data = [
            'screen_info' => $screen_info
        ];

        $db = Database::query();
        $db->where('id', $tracker_id);
        $db->update ('tracking', $data);
    }


    
    // get id by cookie
    // (else by fingerprint) @todo
    // else by session id
    function get($current_id = false) {

        $token = Cookies::find('user_token');
        if( empty($token) ) {
            $token = session_id();
        }

        // get tracking object
        $db = Database::query();
        $db->where('cookie_id', $token);
        $db->orWhere('session_id', $token);
        $results = $db->get ('tracking');

        return $results;
    }

    static function hash_token($pass, $salt = "") {
        $pwd = trim($salt."".$pass);
        $hash = hash('sha256', $pwd);
        return $hash;
    }

    static public function setToken($session_id, $token = '') {
        if ( empty($token) ) {
            $token = self::hash_token(time(), $session_id);
        }
        Cookies::add('user_token', $token, 3600*24*180); // 6 months
        return $token;
    }
}