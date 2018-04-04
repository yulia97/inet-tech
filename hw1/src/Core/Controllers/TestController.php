<?php

namespace Core\Controllers;
class TestController{
    private $container;

    function __construct(Array $cont){
	$this->container = $cont;
    }

    function prepare($params = Array()){
    	     return "JUST a test;";
    }

    function render($params = Array()){
    	     echo $this->prepare($params);
    }
}