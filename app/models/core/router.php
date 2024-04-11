<?php

namespace Models\Core;

class Router {

    static public $routes = [];

    static public $current_route;

    static public function add($name, $controllerPath = false, $page = false) {
        
        //self::$routes[$name] = $path;
        self::$routes[$name] = $controllerPath;

        if( $page ) {
            self::$routes[$name] = [
                $controllerPath,
                $page
            ];
        }        
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

            // remove trailing slash
            $request_uri = '/' . trim($request_uri, '/');

            
            if( !empty(static::$routes[$request_uri]) ) {
                $route = static::$routes[$request_uri];
            }

        }
           
    
        if(!$route) {
            $route = static::$routes['*'];
        }    

        static::$current_route = $route;

        return $route;
    }
    
}


