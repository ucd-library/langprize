<?php 
// App version
// Incrememnt, and document changes in kb.library.ucdavis.edu.
$app_version = "v1.0.1";

// ** TESTING **
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


print('<h1>Main Menu</h1>');

$user  = isset($_SESSION['uname'])?$_SESSION['uname']:'';

// is this a manager?
include('./includes/qry-is-manager.inc.php');
if ($qry_is_manager)
    {
        print('<h2><a href="/manage">Administrators: manage applications &amp; judges</a></h2>');
    }

// is this a judge?
include('./includes/qry-is-judge.inc.php');
if ($qry_is_judge)
    {
        print('<h2><a href="/judge">Judges: score assigned applications</a></h2>');
    }


// otherwise submit an application
print('<h2><a href="/apply">Students: submit Application Form</a></h2>');

 
include('footer.inc.php'); 
?>
