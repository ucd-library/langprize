<?php


$sql = "SELECT * FROM judges WHERE kerberos='".$user."' LIMIT 0,1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    // echo "user id: " . $row["id"] . " is judge";
    $qry_is_judge = TRUE;
    $judge_id = $row['id'];
    $judge_name = $row['name'];
  }
} else {
    // echo "user is not manager";
    $qry_is_judge = FALSE;
}


?>
