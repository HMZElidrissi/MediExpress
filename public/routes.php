<?php

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthentificationController;

$router = new Router();

$router->get('/', HomeController::class, 'home');
$router->get('/login', HomeController::class, 'login');
$router->get('/register', HomeController::class, 'register');
$router->post('/login', AuthentificationController::class, 'login');
$router->post('/register', AuthentificationController::class, 'register');






return $router;