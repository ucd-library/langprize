<h3>Application Submitted</h3>

<p>
	Thank you for submitting your project.
</p>
<p>
A request for a letter of review has been sent to your faculty/instructor reviewer.
Please make sure they are aware of your project entry and the application deadline.
</p>
<p>
Library staff will contact you if there are any questions about your submission.
</p>


<h3>Application Details:</h3>
<?php
$authors=array();
for($i=1;$i<=6;$i++)
	{ 
		if (strlen($FORM['author_'.$i.'_first']) and strlen($FORM['author_'.$i.'_last']))
			{ $authors[]=$FORM['author_'.$i.'_first'].' '.$FORM['author_'.$i.'_last']; }
	}
?>

<div class="myform">
	<h3>Project Detail</h3>
	<div class="formrow">
  	<div class="formlabel">Title:</div>
    <div class="formdata"><?= $FORM['project_title'] ?></div>
  </div>
  <div class="formrow">
  	<div class="formlabel">Category:</div>
    <div class="formdata"><?= $FORM['project_category']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Author(s):</div>
    <div class="formdata"><?= implode('<br />',$authors); ?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Course Name:</div>
    <div class="formdata"><?= $FORM['course_name']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Course Number:</div>
    <div class="formdata"><?= $FORM['course_number']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Instructor Reviewer:</div>
    <div class="formdata"><?= $FORM['sponsor_first'].' '.$FORM['sponsor_last'] ?></div>
  </div>

</div>
