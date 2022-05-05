<?php


$sql = "SELECT * FROM judges WHERE (archived IS NULL or archived=0 or LENGTH(archived)=0)";

$judges = mysqli_query($conn, $sql);



?>
