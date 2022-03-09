<?php

use App\Controllers\HomeController;

return [
   '/' => new Bijou\Route("/", HomeController::class, "hello"),
   '/hello' => new Bijou\Route("/hello", HomeController::class, "hello"),
];
