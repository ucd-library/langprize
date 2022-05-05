<?php

$mail_to = $FORM['sponsor_email'];

$mail_subject = 'Requesting Lang Prize letter of review for '.$FORM['author_1_first'].' '.$FORM['author_1_last'];

$mail_headers = array(
	'From: "UC Davis Library" <langprize@ucdavis.edu>',
	'BCC: mjwarren@ucdavis.edu',
	);


$mail_body  =
'Dear '.$FORM['sponsor_first'].' '.$FORM['sponsor_last'].',

'.$FORM['author_1_first'].' '.$FORM['author_1_last'].' has submitted their '.($appyear-1).'/'.$appyear.' project
for the Norma J. Lang Prize for Undergraduate Information Prize.

Title:   '.$FORM['project_title'].'
Quarter: '.$FORM['project_completed'].'
Course:  '.$FORM['course_name'].'
Course#: '.$FORM['course_number'].'

They have provided your name as the instructor for whose course the submitted work was
completed. As such, we request that you provide an assessment of the quality and originality
of the work and of the student\'s use of information resources. A sample letter/template
can be found on the Library\'s website:
https://www.library.ucdavis.edu/lang-prize/how-to-apply/#application-forms-4

Once the letter is completed, you can upload it to the application site here:
https://langprize.library.ucdavis.edu/review/?a='.$passcode.'

Please note that the Letter must be saved and uploaded as a DOC, DOCX or PDF, and the 
file size should not exceed 10 MB.

** Please submit the Letter before the review deadline: '.date('l, F j, Y',strtotime($qry_dates['instructor_support'])).' **

For more information about the Lang Prize, please visit our website at
https://www.library.ucdavis.edu/lang-prize/

If you have any questions, please contact us at langprize@ucdavis.edu

Thank you,
Lang Prize Coordinator
';

mail($mail_to,$mail_subject,$mail_body,implode("\n",$mail_headers));

?>
