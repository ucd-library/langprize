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
  <h1><a href="./">Judging</a></h1>
</div>

<?php
// initial variable
$user  = isset($_SESSION['uname'])?$_SESSION['uname']:'';
$uploaddir = '/var/www/html/applications/';


// get dates
include_once('/var/www/html/qry-dates.inc.php');

// this section is restricted to authorized JUDGES only

include('../includes/qry-is-judge.inc.php');
if (!$qry_is_judge) {
        include('no-access.inc.php');
        include ('/var/www/html/footer.inc.php'); # do not touch this line
        die();
        }
        else {
            // echo "$user is judge!";
        }

// view an assigned application
if (isset($_GET['application']) and intval($_GET['application'])>0)
    {
        $application_id = intval($_GET['application']);
        include('application.inc.php');
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

?>
