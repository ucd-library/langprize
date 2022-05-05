<?php

// campus authentication required
$caslogin   = 1;
$logouturl  = 'http://langprize.library.ucdavis.edu/logout.php';
require_once('/var/www/include/authentication.inc.php');

// database connection 
require_once('/var/www/include/db-langprize.inc.php');

// ** TESTING **
#ini_set ('display_errors',true);
#ini_set ('error_reporting',E_ALL);
#$showdebug = true;


// page layout 
$title = "Norma J. Lang Prize for Undergraduate Information Research";
include ('/var/www/html/header.inc.php'); # do not touch this line
?>
<!-- = begin local content ================================================= -->

<div class="page-title">
  <h1>Upload Application Support Letter</h1>
</div>



<?php
// initial variable
$username = $_SESSION['uname'];
$uploaddir = '/var/www/html/applications/';

// make sure we haven't passed the application deadline
include('../qry-dates.inc.php');
if (date("Y-m-d")>$qry_dates['review_end'])
	{ 
		include('notice-closed.inc.php');
		include('/var/www/html/footer.inc.php');
		die();
	}

// make sure we have a passcode
if (!isset($GET['a']) or !strlen($GET['a']))
	{
		include('notice-no-passcode.inc.php');
		include('/var/www/html/footer.inc.php');
		die();
	}

// get application details
$passcode = $GET['a'];
$passcode = preg_replace('/[^a-zA-Z0-9]/','',$GET['a']);
include('qry-application.inc.php');
if (!isset($qry_application) or !isset($qry_application['id']))
	{
		// no matching application
		include('notice-not-found.inc.php');
		include('/var/www/html/footer.inc.php');
		die();
	}

// show application details 
include('details.inc.php');

// has letter already been received
if (isset($qry_application['file_letter']) and strlen($qry_application['file_letter']))
	{ 
		include('notice-already-completed.inc.php');
	}
// if form ahs been submitted
elseif (isset($FORM['submit']))
	{
		// letter uploaded
		include('validate.inc.php');
		if (isset($errors) and count($errors))
			{
				print_errors($errors);
				include('form.inc.php');
			}
		else
			{
				include('save-letter.inc.php');
				//include('email-library.inc.php');
				//include('email-author.inc.php');
				include('notice-thanks.inc.php');
			}
	}
else
	{
		include('form.inc.php');
	}
?>     




<!-- = end local content =================================================== -->
<?php
include('/var/www/html/footer.inc.php'); // do not touch this line	
?>
