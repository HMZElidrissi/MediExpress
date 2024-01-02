<?php

use Core\Router;
use App\Controllers\HomeController;

$router = new Router();

$router->get('/', HomeController::class, 'home');




return $router;