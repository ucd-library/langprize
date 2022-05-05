<?php


// *** SUPPORT FILE ***
$max_file_size = 1024*1024*20;
$file_types = array(
		'pdf' => 'application/pdf',
		'doc' => 'application/msword',
		'docx'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	);
// make sure files is working
if (! isset($_FILES['file_letter']))
	{ $errors['fl']='Please upload your Letter of Review as DOC, DOCX or PDF'; }	
// check builtin FILES errors	
elseif ( !isset($_FILES['file_letter']['error']) || is_array($_FILES['file_letter']['error']) ) 
	{ $errors['fe']='There was an unknow problem uploading your Letter of Review. Please try again or contact langprize@ucdavis.edu if this continues'; }
// make sure file isn't too big
elseif ($_FILES['file_letter']['error']==1 or $_FILES['file_letter']['error']==2 or $_FILES['file_letter']['error']==3)
	{$errors['fl']='Your Letter of Review is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
// or missing completely
elseif ($_FILES['file_letter']['error']==4)
	{$errors['fl']='Please upload your Letter of Review'; }
// or any other error
elseif ($_FILES['file_letter']['error']>0)
	{ $errors['fl']='There was an unknown problem uploading your Letter of Review. Please try again or contact langprize@ucdavis.edu if this continues'; }
// now verify submitted file size
elseif ($_FILES['file_letter']['size'] > $max_file_size) 
	{$errors['fe']='Your Letter of Review is too big. Please reduce the file size or contact langprize@ucdavis.edu'; }
// DO NOT TRUST $_FILES['upfile']['mime'] VALUE -- Check MIME Type by yourself.
if (!isset($errors['fl']))
	{
		$ftype = mime_content_type($_FILES['file_letter']['tmp_name']);
		$fisok = array_search($ftype,$file_types);
		if (! $fisok)
			{ $errors['fl']='Your Letter of Review is an invalid file type. Please save as DOC, DOCX or PDF and upload that instead.'; }
		else
			{$FORM['file_letter_type']=$ftype; }
	}

?>

