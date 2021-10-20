<?php
require "../vendor/autoload.php";

use MVP\App;
use MVP\View;

ob_start();

$app = new App;

$app->getRouter()->get("/", function($request)
{
    $view = new View();
    $view->render('home');
});

$app->getRouter()->get("/hello", function($request)
{
    $view = new View();
    $view->render('hello');
});

$app->getRouter()->get("/other", function($request)
{
    dump($this);
    echo $request->path;
});

$app->getRouter()->get("/signup", function($request)
{
    $view = new View();
    $view->render('form');
});


$app->getRouter()->post("/form", function($request)
{
});
