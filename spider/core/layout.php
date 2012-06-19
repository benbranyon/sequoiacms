<?php

class Layout{
	public $arr = array();
	public $file;
    
	//Holds variables assigned to template
    private $data = array();
	
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
    public function set($variable , $value)
    {
        $this->data[$variable] = $value;
    }
}