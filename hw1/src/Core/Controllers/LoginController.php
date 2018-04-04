<?php

namespace Core\Controllers;


class LoginController{

    private $container;

    function __construct(Array $cont){
	$this->container = $cont;
    }

    function prepare($params = array()){
	$twig = $this->container['twig'];
	$log = $this->container['logger'];

	return $twig->render('index.twig');
    }
}
