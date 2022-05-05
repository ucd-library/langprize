<?php
// show loginbar if user is logged in (in subheader.inc.php)
function auth_loginbar()
	{
		$return = '';
		global $_SESSION;
		if (isset($_SESSION['fullname']) and strlen($_SESSION['fullname']))
			{ $name = $_SESSION['fullname']; }
		elseif (isset($_SESSION['user']) and function_exists('auth_fullname'))
			{ $name=auth_fullname(); }
		elseif (isset($_SESSION['user']))
			{ $name=$_SESSION['user']; }
		elseif (isset($_SESSION['uname']))
			{ $name=$_SESSION['uname']; }
		else
			{ $name=''; }
		if (strlen($name))
			{ 
				$return = '<div id="loginbar">Welcome '.strtoupper($name).' <a class="logout" href="/logout.php">logout</a></div>';
			}
		return $return;
	};

?>