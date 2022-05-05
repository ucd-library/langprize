<?php

$mail_to = 'langprize@ucdavis.edu,alemcmanus@ucdavis.edu';

$mail_subject = 'New Lang Prize application submitted by '.$_SESSION['uname'];

$mail_headers = array(
	'From: "UC Davis Library" <langprize@ucdavis.edu>',
	'BCC: mjwarren@ucdavis.edu',
	);


$mail_body  =
'A new Lang Prize application form has been submitted. A notice has been sent to their Instructor Reviewer.

DETAILS:
Author:     '.$FORM['author_1_first'].' '.$FORM['author_1_last'].' ('.$FORM['author_1_email'].')
Title:      '.$FORM['project_title'].'
Category:   '.$FORM['project_category'].'
Completed:  '.$FORM['project_completed'].'
Course:     '.$FORM['course_name'].'
Instructor: '.$FORM['sponsor_first'].' '.$FORM['sponsor_last'].' ('.$FORM['sponsor_email'].')

';

mail($mail_to,$mail_subject,$mail_body,implode("\n",$mail_headers));

?>