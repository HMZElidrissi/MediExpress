<?php

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\MedicamentController;

$router = new Router();

$router->get('/', HomeController::class, 'home');
$router->get('/medicament_table', MedicamentController::class, 'D_medicament');
$router->post('/add_medicament', MedicamentController::class, 'A_medicament');
$router->post('/upp_medicament', MedicamentController::class, 'U_medicament');
$router->get('/delete_medicament', MedicamentController::class, 'delete_medicament');




return $router;
