<?php

$sql = 
"SELECT   *
FROM      applications 
WHERE     id = '".intval($application_id)."'
ORDER BY  submitted DESC";

$qry_applications = mysqli_query($conn, $sql);

?>
