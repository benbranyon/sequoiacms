<?php

class IndexController extends Controller {
	
	var $helpers = array('html');
	
	public function index() {
		$layout = new Layout();
		$layout->set('test', 12 );
		$layout->render('/home/index.php');
	}

}