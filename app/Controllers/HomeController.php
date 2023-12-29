<?php

namespace App\Controllers;
use App\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $this->render('home');
    }
    public function login()
    {
        $this->render('login');
    }
    public function register()
    {
        $this->render('register');
    }
    
}