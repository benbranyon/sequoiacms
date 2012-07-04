<?php

function callHook(){

	$url = REQUEST_URI;

	// strip out our query string
	$url = preg_replace('/\?.+$/i', '', $url);
	$url = trim($url,'/');

	//explode the url
	$urlArray = array();
	$urlArray = explode('/', $url);
	
	//Load front end controllers and actions
	if(isset($urlArray[1]) &&isset($urlArray[2]))
	{
		if($urlArray[1] == 'admin' && $urlArray[2] != 'index')
		{
			if(count($urlArray) < 3){
				$urlArray[2] = "index";
				$urlArray[3] = "index";
			}elseif(count($urlArray) < 4){
				$urlArray[3] = "index";
			}

			//define controller
			$controller = $urlArray[2];
			$controller .= 'admin';
			array_shift($urlArray);
		
			//define action
			$action = $urlArray[2];
			array_shift($urlArray);
			$params = array_map('urldecode', $urlArray);
	
			$controllerName = $controller;
			$controller = ucwords($controller);
			$controller .= 'Controller';
		}
		else
		{
			//for an empty string we assume the user wants to access index/index
			if(count($urlArray) < 3){
				$urlArray[1] = "index";
				$urlArray[2] = "index";
			}elseif(count($urlArray) < 3){
				$urlArray[2] = "index";
			}
			//define controller
			$controller = $urlArray[1];
			array_shift($urlArray);
			//define action
			$action = $urlArray[1];
			array_shift($urlArray);
			$params = array_map('urldecode', $urlArray);
	
			$controllerName = $controller;
			$controller = ucwords($controller);
			$controller .= 'Controller';
		}
	}
	else
	{
		//for an empty string we assume the user wants to access index/index
		if(isset($urlArray[1]))
		{
			if(count($urlArray) < 2 && $urlArray[1] !='admin'){
				$urlArray[1] = "index";
				$urlArray[2] = "index";
			}elseif(count($urlArray) < 3){
				$urlArray[2] = "index";
			}
		}
		else
		{
			if(count($urlArray) < 2){
				$urlArray[1] = "index";
				$urlArray[2] = "index";
			}elseif(count($urlArray) < 3){
				$urlArray[2] = "index";
			}	
		}
		//define controller
		$controller = $urlArray[1];
		array_shift($urlArray);
		//define action
		$action = $urlArray[1];
		array_shift($urlArray);
		$params = array_map('urldecode', $urlArray);
	
		$controllerName = $controller;
		$controller = ucwords($controller);
		$controller .= 'Controller';
	}
	
/*	if($urlArray[1] != 'admin')
	{
		//for an empty string we assume the user wants to access index/index
		if(count($urlArray) < 3){
			$urlArray[1] = "index";
			$urlArray[2] = "index";
		}elseif(count($urlArray) < 3){
			$urlArray[2] = "index";
		}
		//define controller
		$controller = $urlArray[1];
		array_shift($urlArray);
		//define action
		$action = $urlArray[1];
		array_shift($urlArray);
		$params = array_map('urldecode', $urlArray);
	
		$controllerName = $controller;
		$controller = ucwords($controller);
		$controller .= 'Controller';
	}
	//Load backend module admin controllers and actions
	elseif($urlArray[2] != 'index')
	{
print_r($urlArray);
echo '<br />';
		if(count($urlArray) < 3){
			$urlArray[2] = "index";
			$urlArray[3] = "index";
		}elseif(count($urlArray) < 4){
			$urlArray[3] = "index";
		}
print_r($urlArray);
		//define controller
		$controller = $urlArray[2];
		array_shift($urlArray);
		
		//define action
		$action = $urlArray[2];
		array_shift($urlArray);
		$params = array_map('urldecode', $urlArray);
	
		$controllerName = $controller;
		$controller = ucwords($controller);
		$controller .= 'Controller';
	}
	else
	{
		//for an empty string we assume the user wants to access index/index
		if(count($urlArray) < 3){
			$urlArray[1] = "index";
			$urlArray[2] = "index";
		}elseif(count($urlArray) < 3){
			$urlArray[2] = "index";
		}
		//define controller
		$controller = $urlArray[1];
		array_shift($urlArray);
		//define action
		$action = $urlArray[1];
		array_shift($urlArray);
		$params = array_map('urldecode', $urlArray);
	
		$controllerName = $controller;
		$controller = ucwords($controller);
		$controller .= 'Controller';	
	}*/
	
	//we instantiate and call the controller methods
	try{
		if(class_exists($controller)){
			$dispatch = new $controller;
		}else {
			throw new Exception("Invalid call to non-existent controller");
		}
		
		if(method_exists($dispatch, $action)){
			call_user_func_array(array($dispatch, $action), $params);
		}else {
			throw new Exception("Invalid call to non-existent action");
		}
	}catch (Exception $e) {
		echo "<pre>".$e->getMessage()."</pre>";
	}
	
}	

/** Autoload any classes that are required **/

function __autoload($className) {
	//if (file_exists(ROOT . '/spider/database/' . strtolower($className) . EXT)) {
	//	require_once(ROOT . '/spider/database/' . strtolower($className) . EXT);
	//}
	
	// load libraries
	if (file_exists(ROOT . '/lib/' . strtolower($className) . EXT)) {
		require_once(ROOT . '/lib/' . strtolower($className) . EXT);
	}
	
	// load core classes
	if (file_exists(ROOT . '/spider/core/' . strtolower($className) . EXT)) {
		require_once(ROOT . '/spider/core/' . strtolower($className) . EXT);
	}
	
	// load core helpers
	if (file_exists(ROOT . '/spider/helpers/' . strtolower($className) . EXT)) {
		require_once(ROOT . '/spider/helpers/' . strtolower($className) . EXT);
	}
	
	//load system controllers and models
	if (file_exists(ROOT . '/spider/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT)) {
		require_once(ROOT . '/spider/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT);
	}
	
	//Load application controllers and models
	if (file_exists(ROOT . '/application/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT)) {
		require_once(ROOT . '/application/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT);
	}

	if (file_exists(ROOT . '/application/models/' . strtolower($className) . EXT)) {
		require_once(ROOT . '/application/models/' . strtolower($className) . EXT);
	}
	
	/*
	 *      ================
	 *		| Load Admin Module |
	 *		================
	 */
	 
	//Load admin controllers and models
	if (file_exists(ROOT . '/spider/modules/admin/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT)) {
		require_once(ROOT . '/spider/modules/admin/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT);
	}
	
	/*		Fix in future like views
	 *      ================
	 *		| Load  Modules |
	 *		================
	 */
	 
	if (file_exists(ROOT . '/spider/modules/users/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT)) {
		require_once(ROOT . '/spider/modules/users/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT);
	}
	
	if (file_exists(ROOT . '/spider/modules/galleries/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT)) {
		require_once(ROOT . '/spider/modules/galleries/controllers/' . strtolower(preg_replace("/controller/i", "", $className)) . EXT);
	}
	
}

try {
	callHook();
}catch(Exception $e) {
	echo $e->getMessage();
}
	
	
	