
<?php

// require_once('/var/www/include/db-langprize.inc.php');

// $data = array(
// 	'judges_id'               => intval($judge_id),
//     'applications_id'         => intval($GET['assign']),
// );

// $result = $mdb2->autoExecute('scores',$data,MDB2_AUTOQUERY_INSERT);

// if (MDB2::isError($result)) 
// 	{ 
// 		print("Database Error: " . $result->getMessage()); 
// 		print('There was a problem assigning this application. Please contact mdbavister@ucdavis.edu');
// 		include('/var/www/html/footer.inc.php');
// 		die(); 
// 	}
	
// print('<div class="notice">Application assigned to this judge</div>');



$update_jid = intval($judge_id);
$update_aid = intval($GET['assign']);

$sql = "INSERT INTO scores (judges_id, applications_id)
VALUES ($update_jid, $update_aid)";

if ($conn->query($sql) === TRUE) {
	print('<div class="notice">Application assigned to this judge</div>');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo('There was a problem assigning this application. Please contact mjwarren@ucdavis.edu');
  include('/var/www/html/footer.inc.php');
  die(); 
}
	

?>
