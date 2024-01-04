<?php

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\PatientController;


$router = new Router();

$router->get('/', HomeController::class, 'home');
// echo "<pre>";
// print_r($router);
// echo "</pre>";
// die();


$router->get('/patient', PatientController::class, 'patient');

return $router;