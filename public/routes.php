<?php

use Core\Router;
use App\Controllers\HomeController;

$router = new Router();

$router->get('/', HomeController::class, 'home');
$router->get('/login', HomeController::class, 'login');
$router->get('/register', HomeController::class, 'register');
$router->post('/Authentification', HomeController::class, 'Authentification');






return $router;