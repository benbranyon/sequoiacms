<?php

class HtmlHelper {

	
	public function link($title, $url = null, $value = null, $options = array(), $confirmMessage = false) {
		return '<a href="'.$url.'" title="'.$title.'">'.$value.'</a>';
	}
}