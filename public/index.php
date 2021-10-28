<?php
require "../vendor/autoload.php";

use Bijou\App;
use Bijou\View;

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

$app->getRouter()->get("/signup", function($request)
{
    $view = new View();
    $view->render('form');
});


$app->getRouter()->post("/form", function($request)
{
});
