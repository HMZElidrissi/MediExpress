<?php

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthentificationController;

$router = new Router();

$router->get('/', HomeController::class, 'home');
$router->get('/login', HomeController::class, 'login');
$router->get('/register', HomeController::class, 'register');
$router->get('/logout', AuthentificationController::class, 'logout');
$router->post('/login', AuthentificationController::class, 'singIn');
$router->post('/register', AuthentificationController::class, 'singUp');






return $router;