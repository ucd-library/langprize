<?php  ## [include.testbot]/functions-global.inc.php




// display any (form) errors - this function should replace the previous two!!
function print_errors ($errors="",$errormessage="")
  {
		if (is_array($errors) and count($errors))
			{
    		print ('<div class="error">'.(strlen($errormessage)?'<h3>'.$errormessage.'</h3>':'').'<ul>');
		    foreach ($errors as $err)
		      { 
						print('<li>' . $err . '</li>'); 
  		    }; 
  		  print ('</ul></div>'."\r\n");
			}
		elseif (is_string($errors) and strlen($errors))
			{
    		print ('<div class="error">'.(strlen($errormessage)?'<h3>'.$errormessage.'</h3>':'').'<ul><li>'.$errors.'</li></ul></div>'."\r\n");
			};
  };





// Format 10 or 7 digit strings into phone numbers
function print_phone ($phone)
  {
    $digits = array ();
    if (preg_match ('/^\s*\(?(\d{3})?\)?\s*-?\s*(\d{1,3})\s*-?\s*(\d{4})\s*$/', $phone, $digits))
      {
        $area_code = $digits[1];
        $prefix = $digits[2];
        $suffix = $digits[3];
        if (! $area_code) 
          {
            $area_code = '530';
          }
				if ($prefix=='2' or $prefix=='4')
					{
						$prefix = '75'.$prefix;
					}					
        // &#8209; is non-breaking dash
        return $area_code."-".$prefix."-".$suffix;
      }
    else
     {
      return $phone;
    }
  };


// Fix breaks entered into form.text fields
function fn_fixbreaks ($textstring) 
  {
    return preg_replace("/\13/","<br />",$textstring);
  };



// Intercept urls and optionally insert survey link
function print_url ($url='')
  {
		$url = preg_replace('/&amp;/','&',$url);
		$url = preg_replace('/&/','&amp;',$url);
     return $url;
  };



// validate email addresses 
function validateemail ($email="")
  {
	if (filter_var($email,FILTER_VALIDATE_EMAIL))
		return true;
	else
		return false;
  }


// validate a submitted phone number
// allows for "library" numbers: 2-1202
// does not (yet) handle extensions (752-1202 x42)
function validatephone($phone)
  {
    $digits = array ();
    if (preg_match ('/^\s*\(?(\d{3})?\)?\s*-?\s*(\d{1,3})\s*-?\s*(\d{4})\s*$/', $phone, $digits))
      {
				return 1;
			}
    else
			{
      	return 0;
    	}							
  };




//Keep track of rows and return style name for rows
function rowclass ($row=0)
  {
    global $row_count;
		if (! isset($row_count)) $row_count=0;
    if (isset($row) and intval($row)>0) $row_count=0;
		if (isset($row) and intval($row)<0)
			{
				// don't increment counter if we pass "-1"
			}
		else
			{	
    		$row_count ++;
			};

    switch ($row_count % 2) {
      case 1:  return ('odd-row'); break;
      default: return ('even-row');
    };
  };
// old function kept just in case it's still called somewhere
function tablerowclass ($row=0)
	{
		rowclass($row);
	}



// This code should help conceal the email addresses you list 
// on your site from spammers. It's especially useful for email 
// addresses drawn from a database (like in a phonebook application)
// obfuscate takes a string and replaces most characters with the 
// hexidecimal ordinal equivalent. Note: return string is almost 
// certainly much longer than the original email address
function obfuscate($email) 
  {
    $i=0;
    $obfuscated="";
    while ($i<strlen($email)) 
      {
        if (rand(0,2)) 
          {
            $obfuscated.='%'.dechex(ord($email[$i]));
          }
        else
          {
            $obfuscated.=$email[$i];
          }
        $i++;
      }
    return $obfuscated;
  }
// obfuscate_numeric takes a string and replaces the characters with 
// html entity eqivalents. You have to do this if you want to obfuscate 
// the label and have it display normally, or if you just want to 
// obfuscate the "mailto" tag. Note: return string is almost certainly 
// much longer than the plaintext string
function obfuscate_numeric($plaintext) 
  {
    $i=0;
    $obfuscated="";
    while ($i<strlen($plaintext)) 
      {
        if (rand(0,2)) 
          {
            $obfuscated.='&#'.ord($plaintext[$i]).';';
          } 
        else 
          {
            $obfuscated.=$plaintext[$i];
          }
        $i++;
      }
    return $obfuscated;
  }
// this function drives the two above and generates a mailto link. if label 
// isn't set, it just re-obfuscates the email address and uses that as the label
// ** original code named this function "generate_obfuscated_mailto"
// call this function to create a mailto link
function print_mailto ($email,$label="") 
  {
		if ($_SERVER['REMOTE_ADDR']=='128.120.194.193' or 
		    $_SERVER['REMOTE_ADDR']=='128.120.194.194' or 
		    $_SERVER['REMOTE_ADDR']=='128.120.194.195' or 
		    $_SERVER['REMOTE_ADDR']=='192.168.16.251' or 
		    $_SERVER['REMOTE_ADDR']=='192.168.16.252' or 
		    $_SERVER['REMOTE_ADDR']=='192.168.16.253' or
				fn_clientlocation()=='stf')
			{
				return ('<a href="mailto:'.$email.'">'.(strlen($label)?$label:$email).'</a>');
			}
    else
      {
				return('<a href="'.
					obfuscate_numeric('mailto').':'.obfuscate($email).'">'.
					obfuscate_numeric(strlen($label)?$label:$email).
					'</a>');
      }
  }
// call this function to display an email without a link
function print_email($plaintext) 
  {
    $i=0;
    $obfuscated="";
    while ($i<strlen($plaintext))
      {
        if (rand(0,2)) 
          {
            $obfuscated.='&#'.ord($plaintext[$i]).';';
          } 
        else 
          {
            $obfuscated.=$plaintext[$i];
          }
        $i++;
      }
    return $obfuscated;
  }



// generate url-safe passwords/cancelation-codes
function fn_makepassword ($pwlength=16) 
  {
		$password='';
    if ($pwlength>24) $pwlength=24;
    if ($pwlength<4) $pwlength=4;
    for ($x=0; $x<$pwlength; $x++) 
      {
        $password .= chr(rand(65,90));
      };
    return $password;
  };
  
  
// determine location of Client IP address
function fn_clientlocation($ipaddress="")
  {
    /*
			*/
		require_once('Net/IPv4.php');
    $clientIP = strlen($ipaddress)?$ipaddress:$_SERVER['REMOTE_ADDR'];
		$network = new Net_IPv4();
    switch ($clientIP) 
      {
        // proxy server - off campus by definition
        case ($clientIP == "169.237.215.179"):    # Proxy
        case ($network->ipInNetwork($clientIP, "128.120.194.192/28")): # SSL VPN
          return "off";
          break;
        
        // authenticated library staff openvpn users
        case ($network->ipInNetwork($clientIP, "172.17.0.0/16")):
          return "stf";
          break;
          
        // library staff workstations
        case ($network->ipInNetwork($clientIP, "152.79.85.0/26")): # Blaisdell
        case ($network->ipInNetwork($clientIP, "169.237.75.0/24")): # Shields
        case ($network->ipInNetwork($clientIP, "169.237.102.0/24")): # Systems
        case ($network->ipInNetwork($clientIP, "169.237.140.128/25")): # PSE/HSL
        case ($network->ipInNetwork($clientIP, "169.237.215.64/26")): # Admin
          return "stf";
          break;
                  
        // public workstations
        case ($network->ipInNetwork($clientIP, "152.79.85.64/26")): # Blaisdell
        case ($network->ipInNetwork($clientIP, "169.237.76.0/24")): # Shields 
        case ($network->ipInNetwork($clientIP, "169.237.141.0/25")): # PSE/HSL
        case ($network->ipInNetwork($clientIP, "169.237.207.0/26")): # LIL
        // servers
        case ($network->ipInNetwork($clientIP, "169.237.215.128/26")):
          return "pub";
          break;
        
        // on campus addresses
        case ($network->ipInNetwork($clientIP, "128.120.0.0/16")):
        case ($network->ipInNetwork($clientIP, "169.237.0.0/16")):
          return "on";
          break;
        
        // otherwise off campus
        default:
          return "off";
          break;
      }
			return "on";    
  }  

// format call numbers
function print_callno ($callno="")
	{
		$newcallno = preg_replace(
			'/^([[:alpha:]]{1,3})[[:space:]]*([[:digit:]]+\.?[[:digit:]])[[:space:]]*\.[[:space:]]*([[:alpha:]])/',
			'\\1\\2 \\3',
			$callno);
		return ('<span class="callno">'.$newcallno.'</span>');
	};



// function to output content in 2 or 3 columns using new CSS method
function print_columns($col1="",$col2="",$col3="")
	{
		// one or two or three columns
		if (strlen($col3))
			{
				print('<div class="threecolumns"> ');
				print('<div class="container3"> <div class="container2"> <div class="container1"> ');
				print('<div class="col1"> <div class="columncontent"> '.$col1.' </div> </div> ');
				print('<div class="col2"> <div class="columncontent"> '.$col2.' </div> </div> ');
				print('<div class="col3"> <div class="columncontent"> '.$col3.' </div> </div> ');
				print('</div> </div> </div> ');
				print('</div>');
			}
		elseif (strlen($col2))
			{
				print('<div class="twocolumns"> ');
				print('<div class="container2"> <div class="container1"> ');
				print('<div class="col1"> <div class="columncontent"> '.$col1.' </div> </div> ');
				print('<div class="col2"> <div class="columncontent"> '.$col2.' </div> </div> ');
				print('</div> </div> ');
				print('</div>');
			}
		else
			{
				print('<div class="onecolumn"> ');
				print('<div class="container1"> ');
				print('<div class="col1"> <div class="columncontent"> '.$col1.' </div> </div> ');
				print('</div> ');
				print('</div>');
			}
	}

// function to output content-boxes 
function contentbox($content="",$title="")
	{
		$return = '<div class="contentbox">'.
		(strlen($title) ? '<h2>'.$title.'</h2>' : '').
		'<div class="content">'.$content.'</div>'.
		'</div>';
		return $return;
	}

	
// function to look up current email address for username
function getemail($username="")
	{
		$returnvalue = '';
		require('db-directory.inc.php');
		if (intval($username)>1)
			{ $sqlwhere=" user_id='".intval($username)."' "; }
		else
			{ $sqlwhere=" (username='".$username."' OR kerberos_id='".$username."') "; }
		$sql = "SELECT email FROM lib_user WHERE ".$sqlwhere." AND id>1 LIMIT 0,1";
		$result = $mdb2->queryRow($sql, array(), MDB2_FETCHMODE_ASSOC);
		if (isset($result['email']) and strlen($result['email'])) $returnvalue = $result['email'];
		return $returnvalue;
	};

// function to look up full name for username
function getfullname($username="")
	{
		$returnvalue = '';
		require('db-directory.inc.php');
		if (intval($username)>1)
			{ $sqlwhere=" user_id='".intval($username)."' "; }
		else
			{ $sqlwhere=" (username='".$username."' OR kerberos_id='".$username."') "; }
		$sql = "SELECT CONCAT(IF(LENGTH(nickname),nickname,firstname),' ',lastname) as fullname FROM lib_user WHERE ".$sqlwhere." AND id>1 LIMIT 0,1";
		$result = $mdb2->queryRow($sql, array(), MDB2_FETCHMODE_ASSOC);
		if (isset($result['fullname']) and strlen($result['fullname'])>2) $returnvalue = $result['fullname'];
		return $returnvalue;
	};

// function to nicely output arrays for debug
function print_rr($input)
	{
		print('<pre>');
		print_r($input);
		print('</pre>');	
	}
	
// functions to build navigation lists
function build_navigation ($items, $title = "")
  {
    $title = trim ($title);
    $ret = '';
    if (strlen ($title) > 0)  { $ret .= "<h2>$title</h2>\n"; }
    $ret .= build_inline_list ($items, "navigation");
    return $ret;
  }

// Construct an unordered list with separators from an array of strings.
// Don't call directly, use a helper below.
function build_inline_list ($items, $class, $sep = '|', $mobile = false)
  {
    // Make spaces between tags non-breaking 
    foreach (array_keys ($items) as $i)
      {
        $str = $items [$i];
        if (! is_string ($str)) { return "<p>Items must be strings</p>"; }
        $str = trim ($str);
        // break into parts after a tag close
        $parts = explode ('>', $str);
        foreach (array_keys ($parts) as $key) 
          {
            // split the text before the next tag opens
            $text = explode ('<', $parts [$key]);
            // replace the text between tags
            $text [0] = str_replace (" ", "&nbsp;", $text [0]);
            // restore the tag opens we exploded
            $piece = implode ('<', $text);
            // update this part with the new text
            $parts [$key] = $piece;
          }
        // restore the parts between tag closings
        $str = implode ('>', $parts);
        // save changed string back to array
        $items [$i] = $str;
      }
 		$result = "<ul class=\"$class\">\n";
 		$last_item = count ($items) - 1;
    foreach (array_slice ($items, 0, $last_item) as $str)
      {
     		$result .= "    <li> $str&nbsp;$sep </li>\n";
      }
    $result .= "    <li> $items[$last_item] </li>\n";
   
    return $result;
  }
	

?>
