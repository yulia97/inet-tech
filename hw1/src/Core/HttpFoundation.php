<?php
namespace Core;
class HttpFoundation {

    private $get;
    private $post;
    private $server;
    
    function __construct($get, $post, $server){
	$this->get = $get;
	$this->post = $post;
	$this->server = $server;
    }

    function get(){
	return $this->get;
    }

    function post(){
	return $this->post;
    }

    function server(){
	return $this->server;
    }

}
