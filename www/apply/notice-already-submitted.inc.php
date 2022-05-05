<h3> You have already submitted an application for this year </h3>

<div class="myform">
	<div class="formrow">
  	<div class="formlabel">Title:</div>
    <div class="formdata"><?= $qas['project_title'] ?></div>
  </div>
  <div class="formrow">
  	<div class="formlabel">Category:</div>
    <div class="formdata"><?= $qas['project_category']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Completed:</div>
    <div class="formdata"><?= $qas['project_completed']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Course Name:</div>
    <div class="formdata"><?= $qas['course_name']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Course Number:</div>
    <div class="formdata"><?= $qas['course_number']?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Instructor:</div>
    <div class="formdata"><?= $qas['sponsor_first'].' '.$qas['sponsor_last'] ?></div>
  </div>
	<div class="formrow">
  	<div class="formlabel">Submitted:</div>
    <div class="formdata"><?= date('g:ia, F j, Y',strtotime($qas['submitted'])) ?></div>
  </div>

</div>