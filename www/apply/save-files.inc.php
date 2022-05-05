<?php

// for each of the main-file, essay, and bibliography - move to the upload directory

// main project
$newfiletype = strtolower(pathinfo(basename($_FILES['file_project']['name']),PATHINFO_EXTENSION));
$filename_project = $username.'-'.$passcode.'-project.'.$newfiletype;
move_uploaded_file($_FILES["file_project"]["tmp_name"], $uploaddir.$filename_project);

// essay
$newfiletype = strtolower(pathinfo(basename($_FILES['file_essay']['name']),PATHINFO_EXTENSION));
$filename_essay = $username.'-'.$passcode.'-essay.'.$newfiletype;
move_uploaded_file($_FILES["file_essay"]["tmp_name"], $uploaddir.$filename_essay);

// bibliography
$newfiletype = strtolower(pathinfo(basename($_FILES['file_bibliography']['name']),PATHINFO_EXTENSION));
$filename_bibliography = $username.'-'.$passcode.'-bibliography.'.$newfiletype;
move_uploaded_file($_FILES["file_bibliography"]["tmp_name"], $uploaddir.$filename_bibliography);

// optional - additional documentation
if (isset($_FILES['file_additional']) and isset($_FILES['file_additional']['name']))
	{
		$newfiletype = strtolower(pathinfo(basename($_FILES['file_additional']['name']),PATHINFO_EXTENSION));
		$filename_additional = $username.'-'.$passcode.'-additional.'.$newfiletype;
		move_uploaded_file($_FILES["file_additional"]["tmp_name"], $uploaddir.$filename_additional);
	}
else
	{
		$filename_additional='';
	}


?>