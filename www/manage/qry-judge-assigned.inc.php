<?php

$sql = 
"SELECT   s.id,
          s.applications_id,
          s.judges_id,
          s.score_essay,
          s.score_project,
          s.score_bibliography,
          s.score_review,
          (s.score_essay+s.score_project+s.score_bibliography+s.score_review) as score_total,
          a.kerberos, 
          CONCAT(a.author_1_last,', ',a.author_1_first) AS name,
          a.project_title AS title,
          a.sponsor_kerberos AS sponsor,
          a.project_category AS category,
          a.submitted
FROM      scores s,
          applications a
WHERE     (a.archived IS NULL or LENGTH(a.archived)=0) 
  AND     a.year='".$application_year."'
  AND     a.id=s.applications_id
  AND     s.judges_id='".$judge_id."'
ORDER BY  a.submitted DESC";

$judge_ass = mysqli_query($conn, $sql);

?>