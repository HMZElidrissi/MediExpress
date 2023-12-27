<?php

use App\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $this->render('home');
    }
}