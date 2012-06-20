<?php

class Layout{
	public $arr = array();
	public $file;
	
	// An array of names of built-in helpers to include.
	public $helpers = array('Html');
    
	//Holds variables assigned to template
    private $data = array();
	
	// Variables for the view
	public $viewVars = array();
	
	protected function get_sub_views($obj) {
		foreach ($obj as $varname => $var) {
			if ($var instanceof View) {
				$obj->arr[$varname] = $var->get_sub_views($var);
			} else {
				$obj->arr[$varname] = $var;
			}
		}
		extract($obj->arr);
		ob_start();
		if (file_exists(ROOT . '/application/views/' . $obj->file)) {
		
			//extract variables for view
			if (empty($___dataForView)) {
				$___dataForView = $this->viewVars;
			}
			extract($___dataForView, EXTR_SKIP);
			ob_start();
			
			// include view file
			include ROOT . '/application/views/' . $obj->file;
			
		} else {
			throw new Exception("The view file " . ROOT . "/application/views/" . $obj->file . " is not available");
		}
		$html = ob_get_clean();

		return $html;
	}
	
	public function getContent($input_file)
	{
		$this->file = $input_file;
		echo self::get_sub_views($this);

	}

	public function render($input_file) {

		if (file_exists(ROOT . '/application/views/layouts/'.LAYOUT.'.html'))
		{
			include ROOT . '/application/views/layouts/'.LAYOUT.'.html';
		} else {
			throw new Exception("The layout file " . ROOT . "/application/views/layouts/" . LAYOUT.".html is not available. Please create this file or change your layout in Config.");
		}
		$this->set('input_file',$input_file);
	}
	
    /**
     * Receives assignments from controller and stores in local data array
     * 
     * @param $variable
     * @param $value
     */
    public function set($one, $two = null)
    {
        //$this->data[$variable] = $value;
		$data = null;
		if (is_array($one)) {
			if (is_array($two)) {
				$data = array_combine($one, $two);
			} else {
				$data = $one;
			}
		} else {
			$data = array($one => $two);
		}
		if ($data == null) {
			return false;
		}
		$this->viewVars = $data + $this->viewVars;
		//extract($this->viewVars);
    }
}