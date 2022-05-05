<?php


$sql = "SELECT id FROM judges WHERE email='".$FORM['email']."'";

$result = mysqli_query($conn, $sql);



?>
