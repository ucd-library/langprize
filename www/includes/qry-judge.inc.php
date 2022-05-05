<?php


$sql = "SELECT * FROM judges WHERE kerberos = '".$username."'";

$qry_judge = mysqli_query($conn, $sql);



?>
