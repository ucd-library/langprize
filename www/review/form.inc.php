<div class="myform">
	<h3>Upload Completed Support Letter</h3>
	<form action="index.php?a=<?=$passcode?>" method="post" enctype="multipart/form-data">
    <p>Upload you letter of support for this project. We can only accept DOC, DOCX and PDF
    files up to 10MB.</p>
    <div class="">
    	<input type="file" name="file_letter" /> 
    	<input type="submit" name="submit" value="Submit Letter" class="bigbutton" />
    </div>
	</form>
</div>