<?php

namespace App\Controllers;
use App\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $this->renderView('home');
    }
    public function login()
    {
        $this->renderView('login');
    }
    public function register()
    {
        $this->renderView('register');
    }
    public function Authentification()
    {
        $this->renderController('AuthentificationController');
    }
}