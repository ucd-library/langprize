<?php

// assuming that application form data is valid...

$passcode = fn_makepassword(16);
$username = $_SESSION['uname'];
$uploaddir = '/var/www/html/applications/';


// save/rename/move uploaded files
include('save-files.inc.php');
// save to database
include('save-form.inc.php');
// send notice to faculty reviewer
// send notice to langprize
// show thanks to user
include('save-thanks.inc.php');

?>