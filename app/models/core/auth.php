<?php

namespace Models\Core;

use BouletAP\Tools\Cookies;
use Models\Core\Database;


class Auth {
   
    static public function user_can($permission) {

        $auth_hash = Cookies::find('account_id');               
        if( empty($auth_hash)) return false;

        $results = Database::query()->where ('remember_token', $auth_hash)->get ('users');
        return count($results) > 0;
    }



    static function hash_password($pass, $salt = "") {
        $pwd = trim($salt."".$pass);
        $hash = hash('sha256', $pwd);
        return $hash;
    }


    static public function setRememberToken($userEmail, $remember_token = '') {
        if ( empty($remember_token) ) {
            $remember_token = self::hash_password(time(), $userEmail);
        }
        $data = array('remember_token' => $remember_token);
        Database::query()->where ('email', $userEmail)->update('users', $data);
        Cookies::add('account_id', $remember_token, 3600*6);
        return true;
    }
}