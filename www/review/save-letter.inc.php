<?php


// save letter to upload directory
$username = $qry_application['kerberos'];
$newfiletype = strtolower(pathinfo(basename($_FILES['file_letter']['name']),PATHINFO_EXTENSION));
$filename_letter = $username.'-'.$passcode.'-letter.'.$newfiletype;
move_uploaded_file($_FILES["file_letter"]["tmp_name"], $uploaddir.$filename_letter);



// save information to database
require_once('/var/www/include/db-langprize.inc.php');
$sqlvalues = array(
	'sponsor_kerberos' => $_SESSION['uname'],
	'sponsor_submitted'=> date('Y-m-d G:i:s'),
	'file_letter'      => $filename_letter,
	);
$sqlwhere = "id=".$qry_application['id']." AND passcode='".$passcode."'";
 
$result = $mdb2->autoExecute('applications',$sqlvalues,MDB2_AUTOQUERY_UPDATE,$sqlwhere);

if (MDB2::isError($result)) 
	{ 
		//print("Database Error: " . $result->getMessage()); 
		print('There was a problem saving your Letter of Review. Please <a href="index.php">try again</a>. '.
		'If you continue  to see this message, please contact us at langprize@ucdavis.edu');
		include('/var/www/html/footer.inc.php');
		die(); 
	}




?>