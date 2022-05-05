<?php


$sql = 
"SELECT   scores.*,
          (score_essay+score_project+score_bibliography+score_review) AS score_total,
          judges.name as judge,
          judges.kerberos as judgekerberos
FROM      scores, judges 
WHERE     scores.applications_id = '".$application_id."'
  AND     scores.judges_id=judges.id";

  $qry_scores = mysqli_query($conn, $sql);


?>
