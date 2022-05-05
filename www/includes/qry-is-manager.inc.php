<?php


$sql = "SELECT id FROM managers WHERE kerberos='".$user."' LIMIT 0,1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    // echo "user id: " . $row["id"] . " is manager";
    $qry_is_manager = TRUE;

  }
} else {
    // echo "user is not manager";
    $qry_is_manager = FALSE;
}


?>
