<?php
include('/var/www/include/CAS.php');


function authenticateUser () {
    # set debug
    phpCAS::setDebug();

    # initialize phpCAS
    # 3.1 not supported
    phpCAS::client(CAS_VERSION_2_0, 'ssodev.ucdavis.edu',443,'/cas');
    
    // if (getenv('IS_LOCAL')) {
    //   phpCAS::client(CAS_VERSION_2_0, 'ssodev.ucdavis.edu',443,'/cas');
    // } else {
    //   phpCAS::client(CAS_VERSION_2_0, 'cas.ucdavis.edu',443,'/cas');
    // }

    # no SSL validation for the CAS server
    phpCAS::setNoCasServerValidation();

    # customize HTML output (do we need this??)
    phpCAS::setHTMLHeader('<?php include("/var/www/html/header.inc.php"); ?> ');
    phpCAS::setHTMLFooter('<?php include("/var/www/html/footer.inc.php"); ?> ');

    # force CAS authentication
    phpCAS::forceAuthentication();

    return true;
}

function sessionAuthenticate()
	{
		// Check if the user hasn't logged in
    if (!isset($_SESSION['uname']) or !strlen($_SESSION['uname']))
			{
       	return false;
			}
    // Check if the request is from a different IP address that originated the session
		elseif (!isset($_SESSION['loginIP']) || ($_SESSION['loginIP'] != $_SERVER['REMOTE_ADDR']))
			{
      	// Possibly a session hijack attempt
        return false;
			}
		else
			{
				return true;
			}
	}


function sessionLogout($url='')
	{
    # set debug
    phpCAS::setDebug();
    # initialize phpCAS
    # 3.1 not supported
    if (getenv('IS_LOCAL')) {
      phpCAS::client(CAS_VERSION_2_0, 'ssodev.ucdavis.edu',443,'/cas');
    } else {
      phpCAS::client(CAS_VERSION_2_0, 'cas.ucdavis.edu',443,'/cas');
    }
    # no SSL validation for the CAS server
    phpCAS::setNoCasServerValidation();
    # customize HTML output
    phpCAS::setHTMLHeader('<?php include("/var/www/html/header.inc.php"); ?> ');
    phpCAS::setHTMLFooter('<?php include("/var/www/html/footer.inc.php"); ?> ');
    # force CAS authentication
    phpCAS::logout($url);
	}



// actions to force login if necessary
if (isset($cas) and ($cas>0 or $cas===true)) $caslogin=true;
if (isset($caslogin) and $caslogin>0)
	{
		if (! sessionAuthenticate())
			{
				// user not logged in yet
				if (authenticateUser())
					{
						$_SESSION['uname'] = phpCAS::getUser();
						$_SESSION['loginIP'] = $_SERVER['REMOTE_ADDR'];
					}
				else
					{
						print("<p>Sorry, We were not able to authenticate you as a UC Davis user.</p>".
						"<p><a href='https://langprize.library.ucdavis.edu/logout.php'>Logout</a></p>");
					} // end if successful login via CAS
			} // end if user already logged in
	} // end if CAS login is required

// actions to allow logout
if (isset($_GET['logout']))
	{
		$cas_logout_url = isset($logouturl) ? $logouturl : 'https://langprize.library.ucdavis.edu/logout.php';
		phpCAS::logoutWithUrl($cas_logout_url);
	};


?>
