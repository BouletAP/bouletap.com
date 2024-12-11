<?php

namespace Models\Core;

class Redirection {

    public static $routes;

    static function add($origin, $to) {
        self::$routes[$origin] = $to;
    }

    static public function attempt($request_uri) {  

        if( isset(self::$routes[$request_uri]) ) {
            $request_uri = self::$routes[$request_uri];
            header('Location: https://bouletap.com' . $request_uri);
        }
        return false;
    }
}