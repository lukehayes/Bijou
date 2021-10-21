<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->


<!-- PROJECT LOGO -->
<br />
<div align="center">

  <h1 align="center">Bijou</h1>

  <p align="center">
    An incredibly spartan PHP framework designed for builiding MVP ideas quickly.
    <br />
    <a href="https://github.com/lukehayes/Bijou/issues">Report Bug</a>
    ·
    <a href="https://github.com/lukehayes/Bijou/issues">Request Features</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

This project started as a quick and dirty way to develop ideas for the many MVP ideas that I wanted to make and test to see if they where actually good ideas. **Bijou** *only* includes what is necessary (that may change over time) to flesh out an idea. Classes currently included: Router, Session, View, Request, Str, Database, App.

Simple security and authentication will be added in the future.

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [PHP 8](https://php.net)
* [Composer](https://composer.org/)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

* PHP - A version should already exist on your system.
  
* Composer
  ```sh
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
  php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
  php composer-setup.php
  php -r "unlink('composer-setup.php');"
  ```

### Installation

1. Clone this repo
   ```sh
   git clone https://github.com/lukehayes/Bijou.git
   ```
2. `cd` into the cloned project
   ```sh
   cd Bijou
   ```
   
3. Install dependencies through composer
   ```sh
   composer install
   ```
   
4. Run PHP's built in web server
   ```sh
   php -S localhost:8000 -t public
   ```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

### Routing:
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


<p align="right">(<a href="#top">back to top</a>)</p>


<!-- ROADMAP -->
## Roadmap

- [x] Improved readme
- [] Security Class
- [] Simple Middleware
    - [] Authentication
- [] Dashboard
- [] Sass

See the [open issues](https://github.com/othneildrew/Best-README-Template/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

[@lukehayesme](https://twitter.com/lukehayesme) - email@example.com

Project Link: [https://github.com/lukehayes/Bijou](https://github.com/lukehayes/Bijou)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

Use this space to list resources you find helpful and would like to give credit to. I've included a few of my favorites to kick things off!

* [symfony/var-dumper](https://packagist.org/packages/symfony/var-dumper)

<p align="right">(<a href="#top">back to top</a>)</p>


