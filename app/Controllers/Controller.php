<?php

namespace App\Controllers;
class Controller
{
    protected function render($view, $data = [])
    {
       
    //     echo "<pre>";
    //    print_r($data);
    //    echo "</pre>";
    //    die();

         extract($data);
        //  echo "<pre>";
        //  print_r(extract($data));
        //  echo "</pre>";
        //  die();
     
        require_once __DIR__ . "/../../Views/$view.php"; 
    }
}