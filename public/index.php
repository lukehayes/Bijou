<?php
require "../vendor/autoload.php";

$container = new Bijou\Container();
$app = new Bijou\App($container);
$app->run();
