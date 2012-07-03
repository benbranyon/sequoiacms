<?php 

/**
 * @name 		Main admin controller
 * @author 		Ben Branyon
 * @package 	SpiderCMS
 * @subpackage 	spider/controllers
 */

class AdminController extends Controller
{
	/**
	 * Constructor method
	 *
	 * @access admin
	 * @return void
	 */
	public function __construct()
	{
  		parent::__construct();

 	}
	
 	/**
 	 * Show the control panel
	 *
	 * @access admin
	 * @return void
 	 */
 	public function index()
	{
		if(isset($_SESSION['user_id']) && isset($_SESSION['user_group']))
		{
			if($_SESSION['user_group'] == 'admin')
			{
				$user_id = $_SESSION['user_id'];
				$result = mysql_query("SELECT * FROM users WHERE id = '$user_id'")or die(mysql_error());
				$user = mysql_fetch_object($result);
				$user = get_object_vars($user);
				$view = new Adminview();
				$view->set('user', $user );
				$view->render('index.php');
			}
		}
		else
		{
			$this->redirect('users', 'login');
		}
	}
	
/**
 * Manage Users
 *
 * @access admin
 * @return void
 */
	public function manage()
	{
		$view = new Adminview();
		$result = mysql_query("SELECT * FROM users") or die(mysql_error());
		$count = 0;
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$users[$count] = $row;
			$count++;
		}
		$view->set('users', $users);
		$view->render('manage_users.php');
		
	}
}