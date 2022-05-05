<?php
$authors=array();
for($i=1;$i<=6;$i++)
	{ 
		if (strlen($qry_application['author_'.$i.'_first']) and strlen($qry_application['author_'.$i.'_last']))
			{ $authors[]=$qry_application['author_'.$i.'_first'].' '.$qry_application['author_'.$i.'_last']; }
	}
?>

<div class="myform">
	<h3>Project Detail</h3>
	<div class="formrow">
  	<div class="formlabel">Title:</div>
    <div class="formdata"><?= $qry_application['project_title'] ?></div>
  </div>
  <div class="formrow">
  	<div class="formlabel">Category:</div>
    <div class="formdata"><?= $qry_application['project_category']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Author(s):</div>
    <div class="formdata"><?= implode('<br />',$authors); ?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Course Name:</div>
    <div class="formdata"><?= $qry_application['course_name']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Course Number:</div>
    <div class="formdata"><?= $qry_application['course_number']?></div>
  </div>

</div>