<?php

class IndexController extends Controller {
	
	var $helpers = array('Html');
	
	public function index() {
		$layout = new Layout();
		$layout->set('shit', 12 );
		$layout->render('home/index.php');
	}

}