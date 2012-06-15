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
		$view = new Adminview();
		$view->set('headerMessage', 'Admin Panel'  );
		$view->render('index.php');
	}
	
	/**
	 * Log in
	 *
	 * @access public
	 * @return void
	 */
	public function login()
	{
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