<?php

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\MedicamentController;
use App\Controllers\VenteController;

$router = new Router();

$router->get('/', HomeController::class, 'home');
$router->get('/medicament_table', MedicamentController::class, 'D_medicament');
$router->post('/add_medicament', MedicamentController::class, 'A_medicament');
$router->post('/upp_medicament', MedicamentController::class, 'U_medicament');
$router->get('/delete_medicament', MedicamentController::class, 'delete_medicament');
$router->post('/export_pdf', MedicamentController::class, 'export_pdf');
$router->get('/VenteEnlingne', VenteController::class, 'Display_VentEnligne');
$router->get('/VenteEnmagasin', VenteController::class, 'display_ventEnmagasin');
$router->post('/add_vent', VenteController::class, 'Add_Vent');
$router->post('/update_vente', VenteController::class, 'update_vente');




return $router;
