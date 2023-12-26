<?php

namespace Core;
class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = compact('method', 'uri', 'controller');
        /*
         * This is the same as:
         * $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
            ];
        */
    }

    public static function get($uri, $controller)
    {
        (new Router)->add('GET', $uri, $controller);
    }

    public static function post($uri, $controller)
    {
        (new Router)->add('POST', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return $route['controller'];
            } else {
                http_response_code(404);
                echo "404 Page Not Found";
            }
        }
    }

}