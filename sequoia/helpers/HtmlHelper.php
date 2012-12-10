<?php

class HtmlHelper {

	
	public function link($title, $url = null, $value = null, $options = array(), $confirmMessage = false) {
		return '<a href="/'.BASE_DIR . $url.'" title="'.$title.'">'.$value.'</a>';
	}
}