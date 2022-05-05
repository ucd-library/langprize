
<?php

// require_once('/var/www/include/db-langprize.inc.php');

// $sql = "DELETE FROM scores WHERE judges_id='".$judge_id."' and applications_id='".intval($GET['unassign'])."'";

// $result = $mdb2->query($sql);

// if (MDB2::isError($result)) 
// 	{ 
// 		print("Database Error: " . $result->getMessage()); 
// 		print('There was a problem unassigning this application. Please contact mdbavister@ucdavis.edu');
// 		include('/var/www/html/footer.inc.php');
// 		die(); 
// 	}
	
// print('<div class="notice">Application unassigned from this judge</div>');



$sql = "DELETE FROM scores WHERE judges_id='".$judge_id."' and applications_id='".intval($GET['unassign'])."'";


if ($conn->query($sql) === TRUE) {
	print('<div class="notice">Application unassigned from this judge</div>');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo('There was a problem assigning this application. Please contact mjwarren@ucdavis.edu');
  include('/var/www/html/footer.inc.php');
  die(); 
}
	
	

?>
