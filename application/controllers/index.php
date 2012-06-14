<?php

class IndexController {

	public function index() {
		$view = new View('light.php');
		$view->message = "Finally, some light!";
		$view->render();
	}

}