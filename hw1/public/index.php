<?php

require_once '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$log = new Logger('name');
$log->pushHandler(new StreamHandler('../logs/log.log'));

$loader = new Twig_Loader_Filesystem('../tpl');
$twig = new Twig_Environment($loader, array(
    'cache' => '../cache',
));


if (isset($_POST["login"]) && isset($_POST["pwd"])) {

    $login = $_POST["login"];
    $pwd = $_POST["pwd"];
    
    if ($login == 'admin' && $pwd == 'pa$$w0rd'){
	$log->info('Successfull login', array('login' => $login, 'password' => $pwd));	

	echo $twig->render('secret.twig', array('login' => $login));
    } else {
	$log->notice('Failed login', array('login' => $login, 'password' => $pwd));
	
	echo $twig->render('index.twig');
    }

} else {
    echo $twig->render('index.twig');
}


