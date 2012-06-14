<?php

class IndexController extends Controller {

	public function index() {
		$view = new View();
		$view->set('shit', 12 );
		$view->render('home/index.php');
	}

}