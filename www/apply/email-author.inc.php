<?php

$mail_to = $FORM['author_1_email'];

$mail_subject = 'Confirmation of your Lang Prize Application';

$mail_headers = array(
	'From: "UC Davis Library" <langprize@ucdavis.edu>',
	'BCC: mjwarren@ucdavis.edu',
	);

$authors=array();
for ($i=1;$i<=6;$i++)
	{
		if (isset($FORM['author_'.$i.'_first']) and strlen($FORM['author_'.$i.'_first']))
			{ $authors[]=$FORM['author_'.$i.'_first'].' '.$FORM['author_'.$i.'_last'].' ('.$FORM['author_'.$i.'_email'].')'; }
	};


$mail_body  =
'Thank you for submitting your online application for the '.$appyear.' Lang Prize. Your
Instructor Reviewer has been notified to submit their Letter of Review by the 
deadline of '.date('l, F j, Y',strtotime($qry_dates['apply_end'])).'

Here is a summary of your application form:

AUTHOR(S): 
'.implode("\n",$authors).'

PROJECT:
Title:      '.$FORM['project_title'].'
Category:   '.$FORM['project_category'].'
Completed:  '.$FORM['project_completed'].'
Department: '.$FORM['course_department'].'
Course:     '.$FORM['course_name'].'
Number:     '.$FORM['course_number'].'

REVIEWER:
'.$FORM['sponsor_first'].' '.$FORM['sponsor_last'].' ('.$FORM['sponsor_email'].')


If you have any questions, please contact us at langprize@ucdavis.edu

Thank you,
Lang Prize Coordinator
';

mail($mail_to,$mail_subject,$mail_body,implode("\n",$mail_headers));

?>