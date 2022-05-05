
<?php

require_once('/var/www/include/db-langprize.inc.php');

$sqldata = array(
	'name'      => $FORM['name'],
    'email'     => $FORM['email'],
    'kerberos'  => $FORM['kerberos'],
    'art'       => (isset($FORM['art'])?1:0),
    'sci'       => (isset($FORM['sci'])?1:0),
    'fir'       => (isset($FORM['fir'])?1:0),
);

$sqlwhere = 'id='.$judge_id;


$result = $mdb2->autoExecute('judges',$sqldata,MDB2_AUTOQUERY_UPDATE,$sqlwhere);

if (MDB2::isError($result)) 
	{ 
		print("Database Error: " . $result->getMessage()); 
		print('There was a problem assigning this application. Please contact mdbavister@ucdavis.edu');
		include('/var/www/html/footer.inc.php');
		die(); 
	}
	
print('<div class="notice">Judge details updated</div>');
	

?>
