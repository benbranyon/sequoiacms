<?php

class UsersController extends Controller
{

	public function index()
	{
		print_r('here in the users index');
	}

/**
 * Log in
 *
 * @access public
 * @return void
*/
	public function login()
	{
		$view = new Module_layout();
		if(!empty($_POST))
		{
			$username = stripslashes($_POST['username']);
			$password = md5($_POST['password']);
			$result = mysql_query("SELECT * FROM users WHERE email = '$username' && password = '$password'")or die(mysql_error());
			//while($row = mysql_fetch_array($result, MYSQL_NUM)){
			//	print_r($row);
			//}
			//exit;
			$user = mysql_fetch_object($result);
			$user = get_object_vars($user);
			if($user != null)
			{
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['user_group'] = $user['group'];
				$this->redirect('admin', 'index');
			}
		}
		$view->render('login.php');
	}
	
/**
 * Logout
 *
 * @access public
 * @return void
 */
	public function logout()
	{
		session_destroy();
		$this->redirect('admin', 'index');
	}
	
	public function check_admin()
	{	
		if($result = mysql_query("SELECT * FROM users WHERE id =".$_SESSION['user_id']."")or die(mysql_error()))
		{
			return true;
		}
			return false;
	}

}