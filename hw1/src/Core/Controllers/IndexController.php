<?php

namespace Core\Controllers;

use Core\Controllers\LoginController;
use Core\Controllers\SecretController;

class IndexController{
    private $container;

    function __construct(Array $cont = Array()){
	$this->container = $cont;
    }
    
    function render($params = Array()){
	$twig = $this->container['twig'];
	$log = $this->container['logger'];
	
	$loginController = new LoginController($this->container);
	$secretController = new SecretController($this->container);

	$content = '';

	$post = $params['httpRequest']->post();
	
	if (isset($post["login"]) && isset($post["pwd"])) {
	    $login = $post["login"];
	    $pwd = $post["pwd"];

	    if ($login == 'admin' && $pwd == 'pa$$w0rd'){
		$log->info('Successfull login',
			   array('login' => $login, 'password' => $pwd));	

		$content = $secretController->prepare(["login" => $login]);
	    } else {
		$log->notice('Failed login', array('login' => $login, 'password' => $pwd));

		$content = $loginController->prepare();
	    }

	} else {
	    $content = $loginController->prepare();
	}

	
	echo $content;
    }
}

