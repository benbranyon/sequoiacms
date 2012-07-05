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
		$layout = new Admin_layout();
		$layout->render('manage.php');
	}
	
	public function add()
	{
		$layout = new Admin_layout();
		$layout->render('add.php');
		
	}

}