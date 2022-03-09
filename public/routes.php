<?php

use App\Controllers\HomeController;

return [
   '/' => new Bijou\Route("/", HomeController::class, "index"),
   '/hello' => new Bijou\Route("/hello", HomeController::class, "hello"),
];
