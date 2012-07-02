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
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
  		parent::__construct();

 	}
	
 	/**
 	 * Show the control panel
	 *
	 * @access public
	 * @return void
 	 */
 	public function index()
	{
		if(!isset($_SESSION['user_id']) && $_SESSION['user_group'] != 'admin')
		{
			$this->redirect('admin/login');
		}
		else
		{
			$view = new Adminview();
			$view->set('headerMessage', 'Admin Panel'  );
			$view->render('index.php');
		}
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
	}
}