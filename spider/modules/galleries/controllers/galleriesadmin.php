<?php

class GalleriesadminController extends Controller
{

/**
 * Manage Galleries
 *
 * @access admin
 * @return void
 */
	public function index()
	{
		$view = new Admin_layout();
		$view->render('manage.php');
	}

}