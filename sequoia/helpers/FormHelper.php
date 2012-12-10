<?php

class FormHelper {

/*
 * function create: Outputs an opening form tag
 *
 * @params $model 
 * @return form tag (string)
 */
	public function create($model, $options)
	{
		return '<form method="post" action="/'.$model.'/index">';
	}
	
/*
 *
 *
 */
	public function input()
	{
	}
	
/*
 * function close: Outputs a closing form tag
 *
 * @params: $value (string)
 */
	public function close($value)
	{
		return '<input type="submit" value="'.$value.' /></form>';
	}
}