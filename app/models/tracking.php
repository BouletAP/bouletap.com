<?php

namespace BouletAP;

// DB structure
// id (int)
// session_id (int)
// user_agent (text)
// fingerprint (varchar)
// cookie_id (varchar)
// created (int)
// session_funnel (text)
// 

use BouletAP\Tools\Cookies;


class Tracking {
   


    // static public function user_can($permission) {

    //     $auth_hash = Cookies::find('account_id');               
    //     if( empty($auth_hash)) return false;

    //     $results = Database::query()->where ('remember_token', $auth_hash)->get ('users');
    //     return count($results) > 0;
    // }



    // static public function setRememberToken($userEmail, $remember_token = '') {
    //     if ( empty($remember_token) ) {
    //         $remember_token = self::hash_password(time(), $userEmail);
    //     }
    //     $data = array('remember_token' => $remember_token);
    //     Database::query()->where ('email', $userEmail)->update('users', $data);
    //     Cookies::add('account_id', $remember_token, 3600*6);
    //     return true;
    // }
}