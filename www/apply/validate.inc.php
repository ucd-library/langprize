<?php

$errors = array();

$personalpattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
$campuspattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-\.]*ucdavis.edu$/";

// first and last names
if (! strlen($FORM['author_1_first']))
	{ $errors['a1f']='Please enter your First Name'; }
if (! strlen($FORM['author_1_last']))
	{ $errors['a1l']='Please enter your Last Name'; }
// campus (primary) email
if (! strlen($FORM['author_1_email']))
	{ $errors['a1e']='Please enter your Campus Email'; }
elseif (! preg_match($campuspattern,$FORM['author_1_email']))
	{ $errors['a1e']='Campus Email must be a valid @ucdavis.edu address'; }
// personal (secondary) email	
if (! strlen($FORM['author_1_personal']))
	{ $errors['a1p']='Please enter your Secondary Email'; }
elseif (! preg_match($personalpattern,$FORM['author_1_personal']))
	{ $errors['a1p']='Secondary Email must be a valid email address'; }
elseif (preg_match($campuspattern,$FORM['author_1_personal']) and false)
	{ $errors['a1p']='Secondary Email must NOT be an @ucdavis.edu address'; }
// student id
// if (! strlen($FORM['author_1_id']))
// 	{ $errors['a1i']='Please enter your Student ID number'; }
// elseif (! preg_match('/^[0-9]*$/',$FORM['author_1_id']))
// 	{ $errors['a1i']='Please enter a valid Student ID number (digits only)'; }
// Major
if (! strlen($FORM['author_1_major']))
	{ $errors['a1f']='Please enter your Major'; }
// How Learned about LangPrize
if (! isset($FORM['author_1_learned']) or ! strlen($FORM['author_1_learned']))
	{ $errors['cs']='Please specify how you learned about the Lang Prize.'; }
// phone number	
// if (! strlen($FORM['author_1_phone']))
// 	{ $errors['a1t']='Please enter your Phone Number'; }

// additional authors
for ($i=2;$i<=6;$i++)
	{ 
		if ( (isset($FORM['author_'.$i.'_first']) and strlen($FORM['author_'.$i.'_first'])) or 
		(isset($FORM['author_'.$i.'_last']) and strlen($FORM['author_'.$i.'_last'])) )
			{
				// this author was at least partially compelted so validate
				if (! strlen($FORM['author_'.$i.'_first']))
					{ $errors['a'.$i.'f'] = 'Please enter the First Name for author #'.$i; }
				if (! strlen($FORM['author_'.$i.'_last']))
					{ $errors['a'.$i.'l'] = 'Please enter the Last Name for author #'.$i; }
				if (! strlen($FORM['author_'.$i.'_email']))
					{ $errors['a'.$i.'e'] = 'Please enter the Email Address for author #'.$i; }
				// if (! strlen($FORM['author_'.$i.'_id']))
				// 	{ $errors['a'.$i.'i'] = 'Please enter the Student ID Number for author #'.$i; }
			}
	}

// project details	
if (! strlen($FORM['project_title']))
	{ $errors['pn']='Please enter the Title of this project'; }
if (! isset($FORM['project_category']))
	{ $errors['pc']='Please select the best-fit Category for this project'; }	
if (! isset($FORM['project_completed']))
	{ $errors['cd']='Please select the Quarter this project was completed.'; }	
if (! strlen($FORM['course_department']))
	{ $errors['cp']='Please enter the Course Department for this project.'; }	
if (! strlen($FORM['course_name']))
	{ $errors['cn']='Please enter the Course Name for this project.'; }	
if (! strlen($FORM['course_number']))
	{ $errors['cu']='Please enter the Course Number for this project.'; }	

// sponsor/instructor/reviewer	
if (! strlen($FORM['sponsor_first']))
	{ $errors['sf']='Please enter the Faculty/Instrutor Reviewer First Name for this project.'; }	
if (! strlen($FORM['sponsor_last']))
	{ $errors['sl']='Please enter the Faculty/Instrutor Reviewer Last Name for this project.'; }	
if (! strlen($FORM['sponsor_email']))
	{ $errors['se']='Please enter the Faculty/Instrutor Reviewer Email Address for this project.'; }	
elseif (! preg_match($personalpattern,$FORM['sponsor_email']))
	{ $errors['se']='Please enter a valid email address for the Faculty/Instructor Reviewer'; }
if (! strlen($FORM['sponsor_department']))
	{ $errors['sd']='Please enter the Faculty/Instrutor Reviewer Department for this project.'; }	

if (! isset($FORM['copyright']))
	{ $errors['cr']='Please confirm that you have read and agree to the copyright and license information.'; }


// uploaded files validation
include('validate-files.inc.php');

// citations style
if (isset($FORM['citation_other']) and strlen($FORM['citation_other']))
	{ $FORM['citation_style']=$FORM['citation_other']; }
elseif (! isset($FORM['citation_style']) or ! strlen($FORM['citation_style']))
	{ $errors['cs']='Please select or enter a Citation Style for your bibliography.'; }

	
?>

