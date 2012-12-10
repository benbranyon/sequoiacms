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
		if($this->check_admin())
		{
			$layout = new Admin_layout();
			$layout->render('manage.php');
		}
		else
		{
			$this->redirect('users/login');
		}
	}
	
	public function add()
	{
		if($this->check_admin())
		{
			$layout = new Admin_layout();
			$layout->render('add.php');
		}
		else
		{
			$this->redirect('users/login');
		}
		
	}

}