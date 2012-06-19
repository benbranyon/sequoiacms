<?php

class GalleryController {

	public function index() {
		$layout = new Layout();
		$layout->render('gallery/index.php');
	}

}