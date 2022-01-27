<?php
namespace App\Controllers;

use Bijou\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $view = new \Bijou\View();
        $view->set("title", "Home");
        $view->render('home');
    }
}
