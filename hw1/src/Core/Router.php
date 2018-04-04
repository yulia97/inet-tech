<?php

namespace Core;
use Core\HttpFoundation;
use Core\Controllers\TestController;
use Core\Controllers\IndexController;

class Router{
    
    private $container;

    function __construct(Array $cont = Array()){
	$this->container = $cont;
    }

    private function hasPrefix($string, $query){
	return substr($string, 0, strlen($query)) === $query;
    }
    
    
    function handle(){
	$httpParams = new HttpFoundation($_GET, $_POST, $_SERVER);
	
	$path = explode("?", $httpParams->server()['REQUEST_URI']);
	$baseFileName = $path[0];

	$controller;

	if ($baseFileName == '' || $baseFileName == '/' ||
	    $baseFileName == 'index.php' || $baseFileName == 'index'||
	    $baseFileName == '/index.php' || $baseFileName == '/index/'){
	    $controller = new IndexController($this->container);	    
	} else{
	    $controller = new TestController($this->container);
	}

	$controller->render(['httpRequest' => $httpParams]);
	
    }
}
