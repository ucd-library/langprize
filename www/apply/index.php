<?php
if (getenv('IS_LOCAL')) {
	ini_set ('display_errors',false);
	#ini_set ('display_errors',true);
    #ini_set ('error_reporting',E_ALL);
    #$showdebug = true;
}

// campus authentication required
$caslogin   = 1;
$logouturl  = 'http://langprize.library.ucdavis.edu/logout.php';
require_once('/var/www/include/authentication.inc.php');

// database connection
require_once('/var/www/include/db-langprize.inc.php');


// page layout
$title = "Norma J. Lang Prize for Undergraduate Information Research";
include ('/var/www/html/header.inc.php'); # do not touch this line
?>
<!-- = begin local content ================================================= -->

<a style="float:right" href="/">home</a>


<div class="page-title">
  <h1>Application Form</h1>
</div>



<?php
// initial variable
$username = $_SESSION['uname'];
$passcode = fn_makepassword(16);
$uploaddir = '/var/www/html/applications/';

$appyear = date('Y');


// get start/end dates
require('../includes/qry-dates.inc.php');
// bypass application-start date for programmer
if ($username=='spelkey' or $username=='bac') {
  $qry_dates['apply_start']='2020-01-01';
}

// list of citation styles
require('../includes/qry-citations.inc.php');

//check if user has already submitted for this period
require('qry-already-submitted.inc.php');


// application period has not started yet
if (date('Y-m-d')<$qry_dates['apply_start'])
	{ include('notice-not-open.inc.php'); }
// application period has passed
elseif (date('Y-m-d')>$qry_dates['apply_end'])
	{ include('notice-closed.inc.php'); }
// user has already submitted one (or  more) forms
elseif (isset($qry_alreadysubmitted) and ($qry_alreadysubmitted->num_rows>0)) {
	while($qas = mysqli_fetch_assoc($qry_alreadysubmitted)) 
	{ include('notice-already-submitted.inc.php'); }}
// form has been submitted
elseif (isset($FORM['submit']))
	{
		include('validate.inc.php');
		if (count($errors))
			{
				include('form-instructions.inc.php');
				print_errors($errors,'Please correct the following form errors:');
				include('form.inc.php');
			}
		else
			{
				// save/rename/move uploaded files
				include('save-files.inc.php');
				// save to database
				include('qry-save-form.inc.php');
				// send notice to faculty reviewer
				include('email-review.inc.php');
				// send notice to langprize
				include('email-library.inc.php');
				// send confirmation to author
				include('email-author.inc.php');
				// show thanks to user
				include('notice-thanks.inc.php');
			}
	}
else
	{
		include('form-instructions.inc.php');
		include('form.inc.php');
	}
?>




<!-- = end local content =================================================== -->
<?php
include('/var/www/html/footer.inc.php'); // do not touch this line

/*
print('<pre>');
print('<h3>FORM</h3>');
if(isset($FORM)) print_r($FORM);
print('<hr>');
print('<h3>FILES</h3>');
if(count($_FILES)) print_r($_FILES);
print('<hr>');
print('<h3>ERRORS</h3>');
if(isset($errors)) print_r($errors);
print('<hr>');
print('<h3>QUERY</h3>');
//if(isset($qry_alreadysubmitted)) print_r($qry_alreadysubmitted);
print('</pre>');
*/
?>
