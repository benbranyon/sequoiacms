<?php

class IndexController extends Controller {

	public function index() {
		$view = new View();
		$view->render('home/index.php');
	}

}