<?php

namespace App\Controllers;
class Controller
{
    protected function renderView($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../../Views/$view.php";
    }
    protected function renderController($Controller)
    {
        require_once __DIR__ . "/../../App/Controllers/$Controller.php";
    }
}