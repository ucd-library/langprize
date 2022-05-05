<?php


$sql = 
"SELECT   *
FROM      scores 
WHERE     applications_id = '".$application_id."'";

$qry_scores = mysqli_query($conn, $sql);

?>
