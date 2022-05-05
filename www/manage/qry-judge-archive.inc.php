
<?php

require_once('/var/www/include/db-langprize.inc.php');

$sql = "UPDATE judges SET archived=1 WHERE id='".$judge_id."'";

$result = $mdb2->query($sql);

if (MDB2::isError($result)) 
	{ 
		print("Database Error: " . $result->getMessage()); 
		print('There was a problem archiving this judge. Please contact mdbavister@ucdavis.edu');
		include('/var/www/html/footer.inc.php');
		die(); 
	}
	
print('<div class="notice">Judge has been Archived</div>');
	

?>
