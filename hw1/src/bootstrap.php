<?php

require_once '../vendor/autoload.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;


const LOG_FILE = '../logs/log.log';
const TPL_DIR = '../tpl';
const CACHE_DIR = '../cache';


$container['logger'] = new Logger('name');
$container['logger']->pushHandler(new StreamHandler(LOG_FILE));

$loader = new Twig_Loader_Filesystem(TPL_DIR);
$container['twig'] = new Twig_Environment($loader, array(
    'cache' => CACHE_DIR,
));