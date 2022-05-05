<?php

if (getenv('IS_LOCAL')) {
    ini_set ('display_errors',false);
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
  <h1><a href="index.php">Application Management</a></h1>
</div>

<p>
    <a href="index.php">Summary</a> |
    <a href="index.php?scores">Scores</a>
</p>

<?php
// initial variable
$user  = isset($_SESSION['uname'])?$_SESSION['uname']:'';
// $user = 'billy';
$uploaddir = '/var/www/html/applications/';

// get dates
include_once('/var/www/html/qry-dates.inc.php');

// this section is restricted to authorized MANAGERS only
include('../includes/qry-is-manager.inc.php');
if (!$qry_is_manager) {

        include('no-access.inc.php');
        include ('/var/www/html/footer.inc.php'); # do not touch this line
        die();
    }


// view/manage judges
if (isset($_GET['judge']) and strlen($_GET['judge'])>0)
    {
        $judge_id = intval($_GET['judge']);
        include('judge.inc.php');
    }
// view/manage applications
elseif (isset($_GET['application']) and intval($_GET['application'])>0)
    {
        $application_id = intval($_GET['application']);
        include('application.inc.php');
    }
// show scores table
elseif (isset($_GET['scores']))
    {
        include('scores.inc.php');
    }
// show menu/summary
else
    {
        include('summary.inc.php');
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
