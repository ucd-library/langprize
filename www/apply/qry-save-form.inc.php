<?php
	
	$year               = date('Y');
	$kerberos           = $_SESSION['uname'];
	$author_1_first     = $FORM['author_1_first'];
	$author_1_last      = $FORM['author_1_last'];
	$author_1_email     = $FORM['author_1_email'];
	$author_1_personal  = $FORM['author_1_personal'];
	$author_1_studentid = $FORM['author_1_id'];
	$author_1_phone     = $FORM['author_1_phone'];
	$author_2_first     = $FORM['author_2_first'];
	$author_2_last      = $FORM['author_2_last'];
	$author_2_email     = $FORM['author_2_email'];
	$author_2_studentid = $FORM['author_2_id'];
	$author_3_first     = $FORM['author_3_first'];
	$author_3_last      = $FORM['author_3_last'];
	$author_3_email     = $FORM['author_3_email'];
	$author_3_studentid = $FORM['author_3_id'];
	$author_4_first     = $FORM['author_4_first'];
	$author_4_last      = $FORM['author_4_last'];
	$author_4_email     = $FORM['author_4_email'];
	$author_4_studentid = $FORM['author_4_id'];
	$author_5_first     = $FORM['author_5_first'];
	$author_5_last      = $FORM['author_5_last'];
	$author_5_email     = $FORM['author_5_email'];
	$author_5_studentid = $FORM['author_5_id'];
	$author_6_first     = $FORM['author_6_first'];
	$author_6_last      = $FORM['author_6_last'];
	$author_6_email     = $FORM['author_6_email'];
	$author_6_studentid = $FORM['author_6_id'];
	$project_title      = $FORM['project_title'];
	$project_category   = $FORM['project_category'];
	$project_completed  = $FORM['project_completed'];
	$course_department  = $FORM['course_department'];
	$course_name        = $FORM['course_name'];
	$course_number      = $FORM['course_number'];
	$sponsor_first      = $FORM['sponsor_first'];
	$sponsor_last       = $FORM['sponsor_last'];
	$sponsor_email      = $FORM['sponsor_email'];
	$sponsor_department = $FORM['sponsor_department'];
	$submitted          = date('Y-m-d G:i:s');
	$citation_style     = $FORM['citation_style'];

	
	$sql = "INSERT INTO applications (year, kerberos, author_1_first, author_1_last, author_1_email, author_1_personal, author_1_studentid, author_1_phone, author_2_first,author_2_last, author_2_email, author_2_studentid, author_3_first, author_3_last, author_3_email, author_3_studentid, author_4_first, author_4_last, author_4_email, author_4_studentid, author_5_first, author_5_last, author_5_email, author_5_studentid, author_6_first, author_6_last, author_6_email, author_6_studentid, project_title, project_category, project_completed, course_department, course_name, course_number, sponsor_first, sponsor_last, sponsor_email, sponsor_department, submitted, passcode, file_project, file_essay, file_bibliography, file_additional, citation_style)
	VALUES ('$year', '$kerberos', '$author_1_first', '$author_1_last','$author_1_email','$author_1_personal' ,'$author_1_studentid' ,'$author_1_phone' ,'$author_2_first', '$author_2_last', '$author_2_email', '$author_2_studentid', '$author_3_first', '$author_3_last', '$author_3_email', '$author_3_studentid', '$author_4_first', '$author_4_last', '$author_4_email','$author_4_studentid', '$author_5_first', '$author_5_last', '$author_5_email', '$author_5_studentid', '$author_6_first', '$author_6_last', '$author_6_email', '$author_6_studentid','$project_title', '$project_category', '$project_completed', '$course_department', '$course_name', '$course_number', '$sponsor_first', '$sponsor_last', '$sponsor_email', '$sponsor_department', '$submitted', '$passcode', '$filename_project', '$filename_essay', '$filename_bibliography', '$filename_additional', '$citation_style')";
	
	if ($conn->query($sql) === TRUE) {
		print('<div class="notice">Application submitted</div>');
	} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				print('There was a problem saving your application information. Please <a href="index.php">try again</a>. If you continue'.
			' to see this message, please contact us at langprize@ucdavis.edu');
			include('/var/www/html/footer.inc.php');
			die(); 
	}