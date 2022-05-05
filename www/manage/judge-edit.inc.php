<h1>Update Judge Information</h1>


<?php
    
// set form values to exisiting judge data
foreach($qry_judge as $key=>$value)
	{
		$FORM[$key]=$value;
	}
	
print('<form action="index.php?judge='.$qry_judge['kerberos'].'" method="post">');
print('<table class="form">');
// name
print('<tr><td>Name</td><td>'.form_text('name',50).'</td></tr>');
// email
print('<tr><td>Email</td><td>'.form_text('email',50).'</td></tr>');
// kerberos id
print('<tr><td>Kerberos</td><td>'.form_text('kerberos',50).'</td></tr>');
// assignment areas        
print('<tr><td>Areas</td><td>'.
	form_checkbox('art',1,'Art/Humanities/SocialSciences').'<br>'.
	form_checkbox('sci',1,'Sciences/Math').'<br>'.
	form_checkbox('fir',1,'First Year').
	'</td></tr>');
// submit
print('<tr><td colspan="2">');
// is archived?
if ($qry_judge['archived']>0)
    { 
	    print('<strong>THIS JUDGE IS ARCHIVED - '.
	    '<input class="button" type="submit" name="submit" value="Reactivate" /></strong>'); 
	}
else
	{
		print('<input class="button" type="submit" name="submit" value="Save" /> or '.
		'<input class="button" type="submit" name="submit" value="Archive Judge" />');
	}
print('</td></tr>');
	 
// end details
print('</table>');
print form_hidden('judge_id',$qry_judge['id']);
print('</form>');
    
?>