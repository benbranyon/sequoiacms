<?php

function callHook(){

	$url = REQUEST_URI;

	// strip out our query string
	$url = preg_replace('/\?.+$/i', '', $url);
	$url = trim($url,'/');

	//explode the url
	$urlArray = array();
	$urlArray = explode('/', $url);
	
	//for an empty string we assume the user wants to access index/indes
	if(count($urlArray) < 2){
		$urlArray[1] = "index";
		$urlArray[2] = "index";
	}elseif(count($urlArray) < 3){
		$urlArray[2] = "index";
	}
	
	$controller = $urlArray[1];
	array_shift($urlArray);
	$action = $urlArray[1];
	array_shift($urlArray);
	$params = array_map('urldecode', $urlArray);
	
	$controllerName = $controller;
	$controller = ucwords($controller);
	$controller .= 'Controller';
	
	//we instantiate and call the controller methods
	try{
		if(class_exists($controller)){
			$dispatch = new $controller;
		}else {
			throw new Exception("Invalid call to non-existent controller");
		}
		
		if(method_exists($dispatch, $action)){
			call_user_func_array(array($dispatch, $action), $params);
		} else {
			throw new Exceptions("Invalid call to non-existent action");
		}
	}catch (Exception $e) {
		echo "<pre>".$e->getMessage()."</pre>";
	}
	
}	

/** Autoload any classes that are required **/

function __autoload($className) {
	if (file_exists(ROOT . '/db/' . strtolower($className) . EXT)) {
		require_once(ROOT . '/db/' . strtolower($className) . EXT);
	}
	
	if (file_exists(ROOT . '/spider/core/' . strtolower($className) . EXT)) {
		require_once(ROOT . '/spider/core/' . strtolower($className) . EXT);
	}

	if (file_exists(ROOT . '/lib/' . strtolower($className) . EXT)) {
		require_once(ROOT . '/lib/' . strtolower($className) . EXT);
	}
	
	if (file_exists(ROOT . '/application/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT)) {
		require_once(ROOT . '/application/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT);
	}

	if (file_exists(ROOT . '/application/models/' . strtolower($className) . EXT)) {
		require_once(ROOT . '/application/models/' . strtolower($className) . EXT);
	}
}

try {
	callHook();
}catch(Exception $e) {
	echo $e->getMessage();
}
	
	
	