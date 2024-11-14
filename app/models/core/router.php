<?php

namespace Models\Core;

class Router {

    static public $routes = [];

    static public $current_route;

    static public function add($name, $controllerPath = false, $page = false) {

        $param = false;

        // remove parameter ({INT}, {SLUG})
        if( strpos($name, '{INT}') !== FALSE) {
            $param = '{INT}';
            $name = str_replace('/{INT}', '', $name);
        }
        if( strpos($name, '{SLUG}') !== FALSE) {
            $param = '{SLUG}';
            $name = str_replace('/{SLUG}', '', $name);
        }

        
        //self::$routes[$name] = $path;
        self::$routes[$name] = $controllerPath;

        if( $page ) {
            self::$routes[$name] = [
                $controllerPath,
                $page,
                $param
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


        // Check with parameter options, remove last part of the URL
        if(!$route) {
            
            //if( IS_DEV ) {

                $uri = explode('/', $request_uri);
                
                // first part is always controller/method
                $params = false;
                $extra_params = false;
                $request_uri = $uri[0] . "/" . $uri[1];
                if( !empty($uri[2]) ) {
                    $param = $uri[2];

                    if( count($uri) > 3 ) {
                        $extra_params = array_slice($uri, 3);
                    }
                }                
            // }
            // else {

            //     // tmp old way
            //     $param = substr($request_uri, strrpos($request_uri, '/') + 1);
            //     $request_uri = str_replace("/".$param, '', $request_uri);
            // }
            

            if( !empty(static::$routes[$request_uri]) ) {
                $route = static::$routes[$request_uri];
                $route[2] = $param;
                if( $extra_params ) {
                    $route[3] = $extra_params; // send as array
                }
            }
        }
           

    
        if(!$route) {
            $route = static::$routes['*'];
        }    

        static::$current_route = $route;

        return $route;
    }
    
}


