<?php
    
// title including judge name
print('<h2>Judge: '.$qry_judge['name'].'</h2>');

// email address 
print('<table class="form">');
print('<tr><td>Email</td><td>'.$qry_judge['email'].'</td></tr>');
// assignment areas        
print('<tr><td>Areas</td><td>'.
    (($qry_judge['art']>0)?'Art ':'').
    (($qry_judge['sci']>0)?'Sci ':'').
    (($qry_judge['fir']>0)?'1st ':'').
    '</td></tr>');
// is archived?
if (intval($qry_judge['archived'])>0)
    { 
	    print('<tr><td colspan=2><strong>THIS JUDGE IS ARCHIVED</strong></td></tr>'); 
		print('<tr><td colspan=2"><a href="index.php?judge='.$qry_judge['kerberos'].'&reactivate" class="bigbutton">REACTIVATE</a></td></tr>');
	}
// end details
print('</table>');

    
?>