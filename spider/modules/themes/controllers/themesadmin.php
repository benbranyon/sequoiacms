<?php

class ThemesadminController extends Controller
{

/**
 * Manage Themes
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