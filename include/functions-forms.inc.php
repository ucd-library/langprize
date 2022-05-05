<?php
// functions useful to generate or validate forms



function form_option($field="",$value="",$label="")
	{
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		if (strlen($label)==0) $label=$value;
		$formfield = isset($FORM[$field])?$FORM[$field]:'';
		$return = 
			'<option value="'.$value.'"'.
			($formfield==$value?' selected="selected"':'').
			'>'.$label.'</option>';
		return $return;	
	};

function form_option_multiple($field="",$value="",$label="")
	{
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		if (strlen($label)==0) $label=$value;
		// have to check for array for multiple selections
		if (isset($FORM[$field]) and is_array($FORM[$field]))
			{
				$selected = in_array($value,$FORM[$field])? 1 : 0;
			}
		elseif (isset($FORM[$field]))
			{
				$selected = ($FORM[$field]==$value) ? 1 : 0;
			}
		else
			{ $selected=0; }
		$return = 
			'<option value="'.$value.'" '.
			($selected==1?'selected="selected"':'').
			'>'.$label.'</option>';
		return $return;	
	};



function form_radio($field="",$value="",$label="")
	{
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		$id = $field.'_'.preg_replace('/[^a-zA-Z0-9]/','',$value);
		if (strlen($label)==0) $label=$value;
		$formfield = isset($FORM[$field])?$FORM[$field]:'';
		$return = 
			'<input type="radio" name="'.$field.'" value="'.$value.'" '.'id="'.$id.'" '.
			($formfield==$value?'checked="checked"':'').' class="radio" />&nbsp;'.
			'<label for="'.$id.'">'.$label.'</label> ';
		return $return;		
	}
	
	
function form_checkbox($field="",$value="",$label="")
	{
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		$id = $field.'_'.preg_replace('/[^a-zA-Z0-9]/','',$value);
		if (strlen($label)==0) $label=$value;
		$formfield = isset($FORM[$field])?$FORM[$field]:'';
		$return= 
			'<input type="checkbox" name="'.$field.'" value="'.$value.'" '.'id="'.$id.'" '.
			($formfield==$value?'checked="checked"':'').' class="checkbox" />&nbsp;'.
			'<label for="'.$id.'">'.$label.'</label> ';
		return $return;		
	}


function form_text($field="",$size="60",$title="", $placeholder="")	
	{
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		if (! strlen($title)) $title=$field;
		$value = isset($FORM[$field])?$FORM[$field]:'';
		$return = 
			'<input type="text" name="'.$field.'" value="'.$value.'" '.
			(strlen($placeholder)?'placeholder="'.$placeholder.'" ':'').
			'id="'.$field.'" size="'.$size.'" title="'.$title.'" />';
		$return .= '<label for="'.$field.'" style="display: none;">'.$field.'</label>';
		return $return;		
	}

function form_text_utf8($field="",$size="60",$title="")	
	{
		// use global sanitized form variables
		global $FORM_UTF8;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		if (! strlen($title)) $title=$field;
		$value = isset($FORM_UTF8[$field])?$FORM_UTF8[$field]:'';
		$return = 
			'<input type="text" name="'.$field.'" value="'.$value.'" '.
			'id="'.$field.'" size="'.$size.'" title="'.$title.'" />';
		return $return;		
	}
	
function form_textarea($field="",$rows="4",$cols="45",$title="")	
	{
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		if (! strlen($title)) $title=$field;
		$value = isset($FORM[$field])?$FORM[$field]:'';
		$return = 
			'<textarea id="'.$field.'" name="'.$field.'" rows="'.intval($rows).'" cols="'.intval($cols).
			'" title="'.$title.'" >'.$value.'</textarea>';
		return $return;		
	}
		

function form_textarea_utf8($field="",$rows="4",$cols="45",$title="")	
	{
		// use global sanitized form variables
		global $FORM_UTF8;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		$value = isset($FORM_UTF8[$field])?$FORM_UTF8[$field]:'';
		if (! strlen($title)) $title=$field;
		$return = 
			'<textarea name="'.$field.'" id="'.$field.'" rows="'.intval($rows).'" cols="'.intval($cols).
			'" title="'.$title.'">'.$value.'</textarea>';
		return $return;		
	}

function form_hidden($field="",$value="")
	{
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		$return = 
			'<input type="hidden" name="'.$field.'" id="'.$field.'" value="'.$value.'" />';
		return $return;		
	}

function form_value($field="")
	{		
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		$return = (isset($FORM[$field])?$FORM[$field]:'');
		return $return;		
	}

function form_submit($field="submit",$value="submit",$class="button")
	{		
		// use global sanitized form variables
		global $FORM;
		// make sure we have proper input to the function
		if (! strlen($field)) die("ERROR - field name required");
		$return = '<input type="submit" name="'.$field.'" value="'.$value.'" class="'.$class.'" />';
		return $return;		
	}



?>