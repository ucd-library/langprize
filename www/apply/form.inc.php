
<form action="index.php" method="post" enctype="multipart/form-data">

  <div class="myform">
    <h3>About the Author(s) or Creators</h3> 
    <p>
      Please provide this information for every contributor on your project. You can add 
      up to 6 individual contributors on this form. For projects with more than 6 contributors, 
      please include this information for each team member (Name, UCD email, UCD 
      student ID number) as a separate document in the zipped project file you will
      upload below. The document should be named <strong>Lang Prize Team</strong>.
    </p>
    <div class="formrow">
    	<div class="formlabel"><label for="author_1_first">First Name:</label></div>
      <div class="formdata"><?=form_text('author_1_first',50)?></div>
		</div>
    <div class="formrow">
    	<div class="formlabel"><label for="author_1_last">Last Name:</label></div>
			<div class="formdata"><?=form_text('author_1_last',50)?></div>
    </div>
    <div class="formrow">
      <div class="formlabel"><label for="author_1_email">Campus Email</label></div>
      <div class="formdata"><?=form_text('author_1_email',50)?></div>
    </div>
    <div class="formrow">
      <div class="formlabel"><label for="author_1_personal">Secondary Email</label></div>
      <div class="formdata"><?=form_text('author_1_personal',50)?></div>
    </div>
  	<div class="formrow">
      <div class="formlabel"><label for="author_1_id">Student ID Number</label></div>
      <div class="formdata"><?=form_text('author_1_id',20)?></div>
    </div>
    <div class="formrow">
      <div class="formlabel"><label for="author_1_phone">Telephone Number</label></div>
      <div class="formdata"><?=form_text('author_1_phone',20)?></div>
    </div>
    <div class="spacer"></div>
		<input type="checkbox" name="more-authors" id="more-authors-yes"/> 
		<label for="more-authors-yes"> Check this box to add more contributors</label>
    <div class="reveal-if-active">
      <!-- begin extra authors -->
      <?php for ($i=2;$i<=6;$i++) {?>
        <div class="formhead"> Author #<?=$i?> </div>
        <div class="formrow">
          <div class="formlabel"><label for="author_<?=$i?>_first">First Name:</label></div>
          <div class="formdata"><?=form_text('author_'.$i.'_first',50)?></div>
        </div>
        <div class="formrow">
          <div class="formlabel"><label for="author_<?=$i?>_last">Last Name:</label></div>
          <div class="formdata"><?=form_text('author_'.$i.'_last',50)?></div>
        </div>
        <div class="formrow">
          <div class="formlabel"><label for="author_<?=$i?>_email">Campus Email</label></div>
          <div class="formdata"><?=form_text('author_'.$i.'_email',50)?></div>
        </div>
        <div class="formrow">
          <div class="formlabel"><label for="author_<?=$i?>_id">Student ID Number</label></div>
          <div class="formdata"><?=form_text('author_'.$i.'_id',20)?></div>
        </div>
      <?php } // end repeating authors ?>
      <!-- end extra authors -->
    </div>
  </div> 



  <div class="myform">
  <h3>About the Project</h3>
  	<div class="formrow">
  		<div class="formlabel"><label for="project_title">Title of Project</label></div>
      <div class="formdata"><?=form_text('project_title',50)?></div>
    </div>
    <hr />
    <div class="formrow">
    	<div class="formlabel"><label for="project_category">Project Category</label></div>
      <div class="formdata">
      	Please choose the best fit for your project:<br />
      	<?= form_radio('project_category','Arts/Humanities/Social Sciences')?><br />
        <?= form_radio('project_category','Science/Engineering/Math')?><br />
        <?= form_radio('project_category','First-Year Undergraduate')?> (any subject/major)
      </div>
    </div>
    <hr />
  	<div class="formrow">
  		<div class="formlabel"><label for="project_completed">Project Completed:</label></div>
      <div class="formdata">
		<?=form_radio('project_completed','Winter '.$appyear)?><br />
		<?=form_radio('project_completed','Fall '.($appyear-1))?><br />
		<?=form_radio('project_completed','Summer '.($appyear-1))?><br />
		<?=form_radio('project_completed','Spring '.($appyear-1))?>
      </div>
    </div>
    <hr />
  	<div class="formrow">
		<div class="formlabel"><label for="course_department">Course Department</label></div>
		<div class="formdata"><?=form_text('course_department',50)?></div>
    </div>
    <hr />
  	<div class="formrow">
		<div class="formlabel"><label for="course_name">Course Name</label></div>
		<div class="formdata"><?=form_text('course_name',50)?></div>
    </div>
    <hr />
  	<div class="formrow">
  		<div class="formlabel"><label for="course_number">Course Number</label></div>
      <div class="formdata"><?=form_text('course_number',50)?></div>
    </div>
  </div>
  
   <div class="myform">
  	<h3>Upload Project File(s) and Supporting Documents</h3>
    <h4><label for="file_project">Research Paper or Creative Project File(s)</label></h4>
    <ul>
      <li>NOTE: if your research paper or project has a bibliography, include it as part of this file as well as a separate file below.</li>
    </ul>
    <p>
	    If the project is in a format that cannot be submitted electronically, such as an 
    	architectural model, CD, or DVD, please upload documents or photos that describe the 
		project in sufficient detail to allow its merits to be judged. If the project is on 
		the Web, please include the URL. Include the list of co-authors if more than six.
		Please email <a href="mailto:langprize@ucdavis.edu">langprize@ucdavis.edu</a> if you have any questions.
    <div class=""><input type="file" name="file_project" /> [doc, docx, pdf, zip only - max 20MB]</div>
    <hr />
    <h4><label for="file_essay">Reflective Essay</label></h4>
    <p>Describe your research process, highlighting any methods and strategies you learned 
      or developed to access the information you needed for your work.</p>
    <div class=""><input type="file" name="file_essay" /> [doc, docx, pdf only - max 10MB]</div>
    <hr />
    <h4><label for="file_bibliography">Bibliography</label></h4>
    <ul>
        <li>NOTE: if your research paper or project has a bibliography, upload a file containing only the bibliography here. Be sure to also include the bibliography as part of the “Research Paper or Creative Project File(s)” as requested above.</li>
    </ul>
    <p>Must be in a recognized style. Please 
	   <select name="citation_style">
		   <option value="">(Choose style)</option>
		   <?php foreach($qry_citations as $style) print(form_option('citation_style',$style)); ?>
	   </select>
	   or describe:
	   <?= form_text('citation_other',50) ?> 
	</p>
    <div class=""><input type="file" name="file_bibliography" /> [doc, docx, pdf only - max 10MB]</div>

  </div>
  
  <div class="myform">
  	<h3>About Your Instructor Reviewer</h3>
  	<p>Your Instructor Reviewer will be asked to submit a letter supporting your project.</p>
    <div class="formrow">
      <div class="formlabel"><label for="sponsor_first">First Name:</label></div>
      <div class="formdata"><?=form_text('sponsor_first',50)?></div>
    </div>
    <div class="formrow">
      <div class="formlabel"><label for="sponsor_last">Last Name:</label></div>
      <div class="formdata"><?=form_text('sponsor_last',50)?></div>
    </div>
    <div class="formrow">
      <div class="formlabel"><label for="sponsor_email">Campus Email</label></div>
      <div class="formdata"><?=form_text('sponsor_email',50)?></div>
    </div>
    <div class="formrow">
      <div class="formlabel"><label for="sponsor_department">Department</label></div>
      <div class="formdata"><?=form_text('sponsor_department',50)?></div>
    </div>
	</div>
  
  
  <div class="myform">
  <h3>Copyright Information / License Agreement</h3>
  	<p> 
		You retain ownership of the copyright in your submission to the Norma J. Lang 
		Student Research Prize. Should your work be selected as a winner or finalist, 
		you agree to grant UC Davis the option to publish and make your submission 
		available to the public through any UC channel (including eScholarship), in any 
		format, in perpetuity. By submitting, you also indicate that you have the right 
		and ability to grant this license, which is necessary to ensure that we can publish 
		and preserve the winning scholarship. 
     </p>
    
  	<p><?=form_checkbox('copyright','y','I agree')?></p>
    
    <div class="center">
    	<input type="submit" name="submit" value="Submit Form" class="bigbutton" />
		</div>
  </div> 


</form>