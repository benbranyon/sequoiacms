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
		if($this->check_admin())
		{
			$view = new Admin_layout();
			$view->render('manage.php');
		}
		else
		{
			$this->redirect('users', 'login');
		}
	}
	
}