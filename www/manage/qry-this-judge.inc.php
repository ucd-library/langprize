<?php

require_once('/var/www/include/db-langprize.inc.php');

$sql = "SELECT * FROM judges WHERE kerberos = '".$GET['judge']."'";

$qry_this_judge = mysqli_query($conn, $sql);



?>
