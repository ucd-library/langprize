<?php

// *** MAIN PROJECT FILE ***
$max_file_size = 1024*1024*20;
$file_types = array(
		'jpg' => 'image/jpeg',
		'png' => 'image/png',
		'gif' => 'image/gif',
		'pdf' => 'application/pdf',
		'doc' => 'application/msword',
		'docx'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'zip' => 'application/zip',
	);
// make sure files is working
if (! isset($_FILES['file_project']))
	{ $errors['fp']='Please upload your main project file(s) as DOC, PDF or ZIP'; }	
// check builtin FILES errors	
elseif ( !isset($_FILES['file_project']['error']) || is_array($_FILES['file_project']['error']) ) 
	{ $errors['fp']='There was an unknow problem uploading your main project file. Please try again or contact langprize@ucdavis.edu if this continues'; }
// make sure file isn't too big
elseif ($_FILES['file_project']['error']==1 or $_FILES['file_project']['error']==2 or $_FILES['file_project']['error']==3)
	{$errors['fp']='Your main project file is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
// or missing completely
elseif ($_FILES['file_project']['error']==4)
	{$errors['fp']='Please upload your main project file(s)'; }
// or any other error
elseif ($_FILES['file_project']['error']>0)
	{ $errors['fp']='There was an unknown problem uploading your main project file. Please try again or contact langprize@ucdavis.edu if this continues'; }
// now verify submitted file size
elseif ($_FILES['file_project']['size'] > $max_file_size) 
	{$errors['fp']='Your main project file is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }

// DO NOT TRUST $_FILES['upfile']['mime'] VALUE -- Check MIME Type by yourself.
if (!isset($errors['fp']))
	{
		$ftype = mime_content_type($_FILES['file_project']['tmp_name']);
		$fisok = array_search($ftype,$file_types);
		if (! $fisok)
			{ $errors['fp']='Your main project file is an invalid type. Please "zip" and upload that instead.'; }
		else
			{$FORM['file_project_type']=$ftype; }
	}


// *** ESSAY FILE ***
$max_file_size = 1024*1024*10;
$file_types = array(
		'pdf' => 'application/pdf',
		'doc' => 'application/msword',
		'docx'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	);
// make sure files is working
if (! isset($_FILES['file_essay']))
	{ $errors['fe']='Please upload your reflective essay as DOC or PDF'; }	
// check builtin FILES errors	
elseif ( !isset($_FILES['file_essay']['error']) || is_array($_FILES['file_essay']['error']) ) 
	{ $errors['fe']='There was an unknow problem uploading your reflective essay. Please try again or contact langprize@ucdavis.edu if this continues'; }
// make sure file isn't too big
elseif ($_FILES['file_essay']['error']==1 or $_FILES['file_essay']['error']==2 or $_FILES['file_essay']['error']==3)
	{$errors['fe']='Your reflective essay is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
// or missing completely
elseif ($_FILES['file_essay']['error']==4)
	{$errors['fe']='Please upload your reflective essay'; }
// or any other error
elseif ($_FILES['file_essay']['error']>0)
	{ $errors['fe']='There was an unknown problem uploading your reflective essay. Please try again or contact langprize@ucdavis.edu if this continues'; }
// now verify submitted file size
elseif ($_FILES['file_essay']['size'] > $max_file_size) 
	{$errors['fe']='Your reflective essay is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
// DO NOT TRUST $_FILES['upfile']['mime'] VALUE -- Check MIME Type by yourself.
if (!isset($errors['fe']))
	{
		$ftype = mime_content_type($_FILES['file_essay']['tmp_name']);
		$fisok = array_search($ftype,$file_types);
		if (! $fisok)
			{ $errors['fe']='Your reflective essay is an invalid file type. Please save as DOC or PDF and upload that instead.'; }
		else
			{$FORM['file_essay_type']=$ftype; }
	}



// *** BIBLIOGRAPHY FILE ***
$max_file_size = 1024*1024*10;
$file_types = array(
		'pdf' => 'application/pdf',
		'doc' => 'application/msword',
		'docx'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	);
// make sure files is working
if (! isset($_FILES['file_bibliography']))
	{ $errors['fb']='Please upload your bibliography as DOC or PDF'; }	
// check builtin FILES errors	
elseif ( !isset($_FILES['file_bibliography']['error']) || is_array($_FILES['file_bibliography']['error']) ) 
	{ $errors['fb']='There was an unknow problem uploading your bibliography. Please try again or contact langprize@ucdavis.edu if this continues'; }
// make sure file isn't too big
elseif ($_FILES['file_bibliography']['error']==1 or $_FILES['file_bibliography']['error']==2 or $_FILES['file_bibliography']['error']==3)
	{$errors['fb']='Your bibliography is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
// or missing completely
elseif ($_FILES['file_bibliography']['error']==4)
	{$errors['fb']='Please upload your bibliography'; }
// or any other error
elseif ($_FILES['file_bibliography']['error']>0)
	{ $errors['fb']='There was an unknown problem uploading your bibliography. Please try again or contact langprize@ucdavis.edu if this continues'; }
// now verify submitted file size
elseif ($_FILES['file_bibliography']['size'] > $max_file_size) 
	{$errors['fb']='Your bibliography is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
// DO NOT TRUST $_FILES['upfile']['mime'] VALUE -- Check MIME Type by yourself.
if (!isset($errors['fb']))
	{
    //$finfo = new finfo(FILEINFO_MIME_TYPE);
		//$ftype = $finfo->file($_FILES['file_bibliography']['tmp_name'],FILEINFO_MIME);
		$ftype = mime_content_type($_FILES['file_bibliography']['tmp_name']);
		$fisok = array_search($ftype,$file_types);
		if (! $fisok)
			{ $errors['fb']='Your bibliography is an invalid file type. Please save as DOC or PDF and upload that instead.'; }
		else
			{$FORM['file_bibliograpy_type']=$ftype;}
	}
	
	
// *** ADDITIONAL DOCUMENTATION FILE ***
$max_file_size = 1024*1024*20;
$file_types = array(
		'jpg' => 'image/jpeg',
		'png' => 'image/png',
		'gif' => 'image/gif',
		'pdf' => 'application/pdf',
		'doc' => 'application/msword',
		'docx'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'zip' => 'application/zip',
	);
// make sure files is working - this file is optional
if (isset($_FILES['file_additional']))
	{
		
		// check builtin FILES errors	
		if ( !isset($_FILES['file_additional']['error']) || is_array($_FILES['file_additional']['error']) ) 
			{ $errors['fa']='There was an unknown problem uploading your additional documentation file. '.
				'Please try again or contact langprize@ucdavis.edu if this continues'; }
		// make sure file isn't too big
		elseif ($_FILES['file_additional']['error']==1 or $_FILES['file_additional']['error']==2 or $_FILES['file_additional']['error']==3)
			{$errors['fa']='Your additional documentation file is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
		// or missing completely - allowed
		elseif ($_FILES['file_additional']['error']==4)
			{ $tmp=true; }
		// or any other error
		elseif ($_FILES['file_additional']['error']>0)
			{ $errors['fa']='There was an unknown problem uploading your additional documentation file. '.
				'Please try again or contact langprize@ucdavis.edu if this continues'; }
		// now verify submitted file size
		elseif ($_FILES['file_additional']['size'] > $max_file_size) 
			{$errors['fa']='Your main additional documentation is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
		
		// DO NOT TRUST $_FILES['upfile']['mime'] VALUE -- Check MIME Type by yourself.
		// if (!isset($errors['fa']))
		// 	{
		// 		$ftype = mime_content_type($_FILES['file_additional']['tmp_name']);
		// 		$fisok = array_search($ftype,$file_types);
		// 		if (! $fisok)
		// 			{ $errors['fa']='Your additional documentation file is an invalid type. Please "zip" and upload that instead.'; }
		// 		else
		// 			{$FORM['file_additional_type']=$ftype; }
		// 	}
	}
	

?>

