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
		if($this->check_admin())
		{
				$user_id = $_SESSION['user_id'];
				$result = mysql_query("SELECT * FROM users WHERE id = '$user_id'")or die(mysql_error());
				$user = mysql_fetch_object($result);
				$user = get_object_vars($user);
				$view = new Admin_layout();
				$view->set('user', $user );
				$view->render('index.php');
		}
		else
		{
			$this->redirect('users', 'login');
		}
	}
}