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
		$view = new Admin_layout();
		$result = mysql_query("SELECT * FROM users") or die(mysql_error());
		$count = 0;
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$users[$count] = $row;
			$count++;
		}
		$view->set('users', $users);
		$view->render('manage.php');
	}
	
	public function manage_groups()
	{
		$view = new Admin_layout();
		$view->render('manage_groups.php');
	}

}