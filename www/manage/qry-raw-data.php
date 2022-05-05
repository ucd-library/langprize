<?php
  require_once('/var/www/include/db-langprize.inc.php');

  $sql =
  "SELECT   a.id,
            a.year,
            a.author_1_first,
            a.author_1_last,
            a.author_1_email,
            a.author_1_personal,
            a.author_1_studentid,
            a.author_1_phone,
            a.project_title,
            a.project_completed,
            a.course_department,
            a.course_name,
            a.course_number,
            a.sponsor_first,
            a.sponsor_last,
            a.sponsor_department,
            a.sponsor_email,
            a.sponsor_kerberos,
            a.submitted,
            a.sponsor_submitted,
            a.project_category,
            j.name as judgename,
            s.score_essay,
            s.score_project,
            s.score_bibliography,
            s.score_review,
            (s.score_essay+s.score_project+s.score_bibliography+s.score_review) as score_total
  FROM      scores s,
            applications a,
            judges j
  WHERE     (a.archived IS NULL or LENGTH(a.archived)=0)
    AND     a.year='".$application_year."'
    AND     a.id=s.applications_id
    AND     j.id=s.judges_id
  ORDER BY  a.author_1_last;
  ";
  include('/var/www/include/base-query.inc.php');

?>
