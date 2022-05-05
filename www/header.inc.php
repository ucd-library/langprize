<?php

// DEBUG
if (isset($debug))
	{
		ini_set('display_errors',true);
	}
// HIGH-LEVEL SETTINGS
date_default_timezone_set('America/Los_Angeles');


// CAS PROTECTION
if (isset($cas) and ($cas==1 or $cas===true))
	{
		require_once('/var/www/include/authentication.inc.php');
	}



// SITEWIDE FUNCTIONS
require_once ('/var/www/include/functions-global.inc.php');
require_once ('/var/www/include/functions-forms.inc.php');
require_once ('/var/www/include/functions-authentication.inc.php');
require_once ('/var/www/include/constants.inc.php'); 	
require_once ('/var/www/include/sanitize-input.inc.php');

// PAGE DESCRIPTION AND META-DATA
#if (!isset($htmltitle) and isset($title)) $htmltitle=$title;
if (!isset($htmldescription)) $htmldescription='';
if (!isset($htmlkeywords)) $htmlkeywords='';

$htmltitle = "Norma J. Lang Prize for<br />Undergraduate Information Research";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title><?= str_replace('<br />',' ',$htmltitle) ?></title>
  <meta name="description" content="<?= $htmldescription ?>" />
  <meta name="keywords" content="<?= $htmlkeywords ?>" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="language" content="en-US" />
  <meta name="referrer" content="origin-when-crossorigin" />
  <!--link rel="shortcut icon" href="/favicon.ico" /-->
  <link rel="stylesheet" type="text/css" href="/library.css" media="all"  />
	<link rel="stylesheet" type="text/css" href="/langprize.css" media="all" />
  <!--[if gte IE 5]>
    <link rel="stylesheet" type="text/css" href="/css/ie-bug-fix.css" media="screen" />
  <![endif]-->
</head>

<body class="">
  <div class="header">
  	<div class="logo">
    	<a href="https://www.library.ucdavis.edu">
    	<img src="/img/ucd-lib-logo2.png" alt="UC Davis Library Logo" width="240px" height="70px" /></a>
    </div>
    <h1><?= $htmltitle ?></h1>
  </div>
  <?php print auth_loginbar(); ?> 
  <div class="content">
