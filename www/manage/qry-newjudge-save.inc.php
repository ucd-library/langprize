<?php
    

    $sqlname = $FORM['name'];
    $sqlkerbors = $FORM['kerberos'];
    $qryemail = $FORM['email'];
    $qryart = isset($FORM['art'])?1:0;
    $qrysci = isset($FORM['sci'])?1:0;
    $qryfir = isset($FORM['fir'])?1:0;
    // $qryart = 1;
    // $qrysci = 0;
    // $qryfir = 0;
	
	$sql = "INSERT INTO judges (name, kerberos, email, art, sci, fir)
	VALUES ('$sqlname', '$sqlkerbors', '$qryemail', $qryart, $qrysci, $qryfir)";
	
	if ($conn->query($sql) === TRUE) {
		print('<div class="notice">Application assigned to this judge</div>');
	} else {
	  $message="Error: Unable to save new judge. If this continues, please contact mjwarren@ucdavis.edu";
	//   echo "Error: " . $sql . "<br>" . $conn->error;
	}