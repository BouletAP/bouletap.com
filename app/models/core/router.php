<?php

namespace Models\Core;

class Router {

    static public $routes = [];

    static public function add($name, $path) {
        self::$routes[$name] = $path;
    }

    static public function run() {

        $base_path = '/v2';
        $route = false;
    
        $request_uri = $_SERVER['REQUEST_URI'];
    
        if( $request_uri != $_SERVER['SCRIPT_NAME'] ) {
            $request_uri = str_replace($base_path, '', $request_uri);
    
            if( strpos($request_uri, '?') !== FALSE ) {
                $request_uri = substr($request_uri, 0, strpos($request_uri, '?'));
            }
            
            $routes = static::$routes;
            
            if( !empty(static::$routes[$request_uri]) ) {
                $route = static::$routes[$request_uri];
            }
        }
           
    
        if(!$route) {
            $route = static::$routes['*'];
        }
    
        return $route;
    }
    
}


