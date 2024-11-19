<?php

namespace Models\Core;

class Router {

    static public $routes = [];

    static public $current_route;

    static public function add($name, $controllerPath = false, $page = false) {

        $params = 0;

        // remove parameter ({ARGS}, {SLUG})
        if( strpos($name, '{ARGS}') !== FALSE) {
            

            $params = explode("/{ARGS}", $name);'';
            $name = str_replace('/{ARGS}', '', $name);

            $params = count($params) -1;            
        }

        

        
        //self::$routes[$name] = $path;
        self::$routes[$name] = $controllerPath;

        if( $page ) {
            self::$routes[$name] = [
                $controllerPath,
                $page,
                $params
            ];
        }        
    }


    static public function run() {

        $base_path = '/v2';
        $route = false;
    
        $request_uri = $_SERVER['REQUEST_URI'];

        
        // @todo: What are we looking for here?
        // needed to build the right $request_uri
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

        $route = static::find_route($request_uri);
    
        if(!$route) {
            $route = static::$routes['*'];
        }    

        static::$current_route = $route;

        return $route;
    }


    static public function find_route($uri) {
        $route = false;

        $parts = explode('/', $uri);
        
        // first index is always empty, @todo refactor to remove first slash?
        array_shift($parts);    


        $test = 0;
        foreach( static::$routes as $name => $infos ) {

            $test++;


            $url_length = count($parts) - (int)$infos[2];
            if( $url_length <= 0 ) {
                $url_length=1;
            }
            
            // build url to look for
            $url = "";
            for( $i = 0; $i < $url_length; $i++ ) {
                $url .= "/".$parts[$i];
            }

            if( $url == $name ) {
                $route = static::$routes[$name];

                if( (int)$infos[2] > 0 ) {
                    $args = [];
                    for( $i = $url_length; $i < count($parts); $i++ ) {
                        $args []= $parts[$i];
                    }
                    $route[2] = $args;
                }
                
            }
        }

        return $route;
    }
}


