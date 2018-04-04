<?php

namespace Core\Controllers;


class SecretController{

    private $container;

    function __construct(Array $cont){
	$this->container = $cont;
    }

    function prepare($params = array()){
	$twig = $this->container['twig'];
	$log = $this->container['logger'];

	return $twig->render('secret.twig', array('login' => $params['login']));
    }
}
