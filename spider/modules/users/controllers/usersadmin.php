<?php

class UsersadminController extends Controller
{

/**
 * Manage Users
 *
 * @access admin
 * @return void
 */
	public function index()
	{
		if($this->check_admin())
		{
			$view = new Admin_layout();
			$result = mysql_query("SELECT * FROM users") or die(mysql_error());
			$count = 0;
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$users[$count] = $row;
				$count++;
			}
			$view->set('users', $users);
			$view->render('manage.php');
		} else {
				$this->redirect('users', 'login');
		}
	}
	
	public function add()
	{
		if($this->check_admin())
		{

			if(!empty($_POST)){
			}
			else
			{
				$view = new Admin_layout();
				$view->render('add.php');
			}
		}
		else
		{
			$this->redirect('users', 'login');
		}
	
	}
	
	public function manage_groups()
	{
		if($this->check_admin())
		{
			$view = new Admin_layout();
			$view->render('manage_groups.php');
		}
		else
		{
			$this->redirect('users', 'login');
		}
	}

}