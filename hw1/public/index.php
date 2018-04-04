<?php

require_once("../src/bootstrap.php");
use Core\Router;


$router = new Router($container);
$router->handle();
