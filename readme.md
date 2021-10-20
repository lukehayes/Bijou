# Bijou

An incredibly spartan framework for Building MVP ideas in PHP.

### Installation
 * Clone the project.
 * `cd` into that directory.
 * Run `composer install` to download all dependicies.
 * Run your PHP webserver `php -S localhost:8000 -t public`

### Usage

#### Routing
Inside your public/index.php
```php
<?php
require "../vendor/autoload.php";

use MVP\App;
use MVP\View;

$app = new App;

// The most basic example of routing:
$app->getRouter()->get("/", function($request)
{
    echo "Page Loaded!";
});

// Same example as above but this one loads a view template:
$app->getRouter()->get("/", function($request)
{
    $view = new View();
    $view->render('home');
});

```
