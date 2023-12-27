<?php

use Core\Router;

$router = new Router();

$router->get('/', HomeController::class, 'home');



return $router;