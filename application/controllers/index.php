<?php

class IndexController extends Controller {
	
	
	public function index() {
		$layout = new Layout();
		$layout->set('shit', 12 );
		$layout->render('home/index.php');
	}

}