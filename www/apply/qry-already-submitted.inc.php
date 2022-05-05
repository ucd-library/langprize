<?php


$sql = "SELECT * FROM applications WHERE kerberos='".$username."' LIMIT 0,1";

$qry_alreadysubmitted =  mysqli_query($conn, $sql);
