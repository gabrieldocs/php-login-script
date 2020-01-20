<?php 

    class Router
    {   
        private $routes = [];

        public function on($method, $path, $callback) {
            $method = strtolower($method);
            if(!isset($this->routes[$method])):
                $this->routes[$method] = [];
            endif;

            $uri = substr($path, 0, 1) !== '/' ? '/'.$path : $path;
            $pattern = str_replace('/', '\/', $uri);
            $route = '/ˆ'. $pattern . '$/';

            $this->routes[$method][$route] = $callback;

            return $this;
        }

        public function run($method, $uri) {
            $method = strtolower($this->routes[$method]);
            if(!isset($this->routes[$method])):
                return null;
            endif;
        }
        
        public function __construct()
        {
            die("Direct access not allowed!");
        }    
    }

    $router->on('GET', 'path/to/action', function($parameters) {
        return;
    });