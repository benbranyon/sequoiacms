<?php

class View {
	public $arr = array();
	public $file;

	public function __construct($file) {
		$this->file = $file;
	}
	
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

	public function render() {
		echo self::get_sub_views($this);
	}
}