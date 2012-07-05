<?php

abstract class Controller {

/**
 * The layout being used by the controller.
 *
 * @var string
 */
	public $layout;
	

/**
 * The module the controller belongs to.
 *
 * @var string
 */
	public $module;
	
/**
 * Create a new Controller instance.
 *
 * @return void
 */
	public function __construct()
	{
		// If the controller has specified a layout to be used when rendering
		// views, we will instantiate the layout instance and set it to the
		// layout property, replacing the string layout name.
		if ( ! is_null($this->layout))
		{
			$this->layout = $this->layout();
		}
		
	}
	
/**
 * Create the layout that is assigned to the controller.
 *
 * @return View
 */
	public function layout()
	{
		if (starts_with($this->layout, 'name: '))
		{
			return View::of(substr($this->layout, 6));
		}

		return View::make($this->layout);
	}
	
	
	public function redirect($controller, $action)
	{
		header("Location: ".HTTP_PATH.'/'.$controller.'/'.$action);
	}
	
	public function check_login()
	{
	}
	
	public function check_admin()
	{
		if(isset($_SESSION['user_id']) && isset($_SESSION['user_group']))
		{
			if($_SESSION['user_group'] == 'admin')
			{
				return true;
			}
			return false;
		}
		return false;
	}
}