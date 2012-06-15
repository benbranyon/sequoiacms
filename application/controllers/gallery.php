<?php

class GalleryController {

	public function index() {
		$view = new View();
		$view->render('gallery/index.php');
	}

}