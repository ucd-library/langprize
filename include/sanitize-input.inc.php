<?php  
/* **********************************************************************

[include.testbot]/sanitize-input.inc.php

These functions "sanitize" user input (url, form, cookie, etc.), and 
write to safer arrays:
	
	$FORM
	$GET
	$COOKIE
	$REQUEST
	$SESSION 
	
use varaints to get different levels of cleanliness

	$FORM_HTML
	$FORM_UTF8

********************************************************************** */


// noscripts - remove any embedded scripts (but preserve HTML)
function sanitize_noscript($input='')
	{
		return trim('foo');	
	}

// default - remove any HTML or special characters
function sanitize_default($input='')
	{
		if(is_array($input)) {
			$new = array();
			foreach($input as $key => $value) 
				$new[sanitize_fieldname($key)] = sanitize_default($value);
			return $new;
		}
		else
		{
			$allowtags='';
			return trim(htmlspecialchars($input,ENT_COMPAT,'UTF-8'));
		}
	}

// html - escape html, allow utf8
function sanitize_html($input='')
	{
		if(is_array($input)) {
			$new = array();
			foreach($input as $key => $value) 
				$new[sanitize_fieldname($key)] = sanitize_html($value);
			return $new;
		}
		else
		{
			//return trim(htmlentities($input,ENT_COMPAT,'UTF-8'));
			$allowtags='<div><p><strong><span><table><tr><th><td><ul><li><ol><a><h3><h4><h5><h6><dl><dt><dd><img>';
			return trim(strip_tags($input,$allowtags));
		}
	}

// preserve utf8 characters and allow some (safe) html tags through
function sanitize_utf8($input='')
	{
		if(is_array($input)) {
			$new = array();
			foreach($input as $key => $value) 
				$new[sanitize_fieldname($key)] = sanitize_utf8($value);
			return $new;
		}
		else
		{
			$allowtags='';
			return trim(htmlspecialchars($input,ENT_COMPAT,'UTF-8'));

		}
	}


// fieldname - strip most non-alpahnumeric characters
function sanitize_fieldname($input='')
	{
		return strtolower(preg_replace('/[^a-zA-Z0-9_\-]/','',$input));
	}

// maximum - strip all non-alpahnumeric characters
function sanitize_maximum($input='')
	{
		if(is_array($input)) {
			$new = array();
			foreach($input as $key => $value)
				$new[sanitize_fieldname($key)] = sanitize_maximum($value);
			return $new;
		}
		else
			return trim(htmlspecialchars(strip_tags($input),ENT_COMPAT,'UTF-8'));
	}
	
// Directory path
function sanitize_directory($path='') 
	{
		if (! strlen($path)) $path = $_SERVER['SCRIPT_NAME'];
		// remove ".." from the passed path
		$safepath = preg_replace("/\.\./","",$path);
		return $safepath;
	}	

// Date format check
// Move this to another function file or application
/*
$datepattern = '/^\d{4}-\d{2}-\d{2}$/';
if (preg_match($datepattern, $newsitem['pubdate'])) {
  list ($year, $month, $day) = split('-', $newsitem['pubdate']);
  $clean['pubdate'] = "$day " . date('M', strtotime($month)) . " $year 00:00:00 GMT";
} else {
  $clean['pubdate'] = "not a legal value";
}
*/

// make safer arrays for all pages:
// Form variables
if (isset($_POST) and count($_POST))
	{
		foreach ($_POST as $key=>$value)
			{
				// default array (no html allowed)
				$FORM[sanitize_fieldname($key)] = sanitize_default($value);
				// html allowed, but escaped
				$FORM_HTML[sanitize_fieldname($key)] = sanitize_html($value);
				// "safe" html allowed, utf8 preserved
				$FORM_UTF8[sanitize_fieldname($key)] = sanitize_utf8($value);
				// super clean
				$FORM_CLEAN[sanitize_fieldname($key)] = sanitize_maximum($value);
			}
	}

// URL variables
if (isset($_GET) and count($_GET))
	{	
		// $GET = sanitize_maximum($_GET);
		foreach ($_GET as $key=>$value)
			{
				// default array (alphanumeric only)
				$GET[sanitize_fieldname($key)] = sanitize_default($value);
				$GET_CLEAN[sanitize_fieldname($key)] = sanitize_maximum($value);
			}
	}

// Request variables
$REQUEST=array();
if (isset($_REQUEST) and count($_REQUEST))
	{
		foreach ($_REQUEST as $key=>$value)
			{
				// default array (no html allowed)
				$REQUEST[sanitize_fieldname($key)] = sanitize_default($value);
			}
	}


// Cookie variables
$COOKIE=array();
if (isset($_COOKIE) and count($_COOKIE))
	{
		foreach ($_COOKIE as $key=>$value)
			{
				// default array (no html allowed)
				$COOKIE[sanitize_fieldname($key)] = sanitize_default($value);
			}
	}

// Session variables
if (isset($_SESSION) and count($_SESSION))
	{
		// default array (no html allowed)
		sanitize_default($_SESSION);
	}
	
// Server variables
$SERVER=array();
foreach ($_SERVER as $key=>$value)
	{
		// default array (no html allowed)
		$SERVER[sanitize_fieldname($key)] = sanitize_default($value);
	}

	
?>
