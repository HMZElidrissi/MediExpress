<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Core\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = require_once 'routes.php';

try {
    $route = $router->route($uri, $method);
    $controller = new $route['controller']();
    $action = $route['action'];
    $controller->$action();
} catch (Exception $e) {
}
