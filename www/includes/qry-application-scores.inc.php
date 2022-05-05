<?php


$sql = 
"SELECT   *
FROM      scores 
WHERE     applications_id = '".intval($application_id)."'
  AND     judges_id = '".intval($judge_id)."'";

  $qry_application_scores = mysqli_query($conn, $sql);

?>
