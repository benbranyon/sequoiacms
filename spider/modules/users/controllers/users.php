<?php

class UsersController extends Controller
{

	public function index()
	{
	}

/**
 * Log in
 *
 * @access public
 * @return void
*/
	public function login()
	{
		$view = new Adminview();
		if(!empty($_POST))
		{
			$username = stripslashes($_POST['username']);
			$password = md5($_POST['password']);
			$this->redirect('admin', 'index');
		}
		$view->render('login.php');
	}


}