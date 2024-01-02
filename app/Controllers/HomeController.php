<?php

namespace App\Controllers;
use App\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $user=new user();
        $this->render('home');
    }
}