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
			$check = mysql_query("SELECT * FROM users WHERE email = '$username' && password = '$password'")or die(mysql_error());
			if($check)
			{
				$_SESSION['user_id'] = 1;
				$_SESSION['user_group'] = 'admin';
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