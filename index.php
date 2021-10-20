<?php
require "vendor/autoload.php";

use MVP\App;
use MVP\View;

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
    echo $request->path;
});

$app->getRouter()->get("/form", function($request)
{
    $view = new View();
    $view->render('form');
});

$app->getRouter()->post("/form", function($request)
{
    dump($request->name);
    dump($request->age);
});
