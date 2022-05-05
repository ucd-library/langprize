<?php
    
// get information about this judge
include('qry-this-judge.inc.php');

if ($qry_this_judge->num_rows > 0)
{
	// show details about judge & allow editting 
	while($qry_judge = $qry_this_judge->fetch_assoc()) {
        $judge_id=$qry_judge['id'];
        // FORM ACTIONS
        // add or remove assignments
        if (isset($GET['assign']) and intval($GET['assign'])>0)
            { 
                include('qry-judge-assign.inc.php');
            }
        elseif (isset($GET['unassign']) and intval($GET['unassign'])>0)
            { 
                include('qry-judge-unassign.inc.php');
            }
        // reactivate an archived judge
        elseif (isset($GET['reactivate']))
        	{
	        	include('qry-judge-reactivate.inc.php');
	        	include('qry-this-judge.inc.php');
	        	die('reactivated');
        	}
        // edit judge details
        elseif (isset($FORM['submit'])) 
        	{
	        	if ($FORM['submit']=='Archive Judge')
	        		{
						include('qry-judge-archive.inc.php');

		        	}
		        elseif ($FORM['submit']=='Reactivate')
		        	{
			        	include('qry-judge-reactivate.inc.php');
		        	}
		        elseif ($FORM['submit']=='Save')
		        	{
			        	include('qry-judge-update.inc.php');
		        	}
		        // get refreshed judge details
				include('qry-this-judge.inc.php');
		    }
		 // edit judge details (form)
        if (isset($GET['edit']))
        	{
	        	include('judge-edit.inc.php');
        	}
    	// or display judge details
    	else
    		{
	    		include('judge-details.inc.php');
	    	}
	    	
        // show current assignments
        include('judge-assigned.inc.php');
	}
}
// if not found show error and link back to summary screen
else {
	print('<div class="error"><h3>Error: Unable to find this judge</h3>
	<p>Please go back to the <a href="index.php">Summary Page</a></p>
	</div>');
}

// if not found show error and link back to summary screen
if (! isset($qry_judge) or ! isset($qry_judge['id']) or $qry_judge['id'<1])
    {

    }

// show details about judge & allow editting 
// else
//     {
//         $judge_id=$qry_judge['id'];
//         // FORM ACTIONS
//         // add or remove assignments
//         if (isset($GET['assign']) and intval($GET['assign'])>0)
//             { 
//                 include('qry-judge-assign.inc.php');
//             }
//         elseif (isset($GET['unassign']) and intval($GET['unassign'])>0)
//             { 
//                 include('qry-judge-unassign.inc.php');
//             }
//         // reactivate an archived judge
//         elseif (isset($GET['reactivate']))
//         	{
// 	        	include('qry-judge-reactivate.inc.php');
// 	        	include('qry-this-judge.inc.php');
// 	        	die('reactivated');
//         	}
//         // edit judge details
//         elseif (isset($FORM['submit'])) 
//         	{
// 	        	if ($FORM['submit']=='Archive Judge')
// 	        		{
// 						include('qry-judge-archive.inc.php');

// 		        	}
// 		        elseif ($FORM['submit']=='Reactivate')
// 		        	{
// 			        	include('qry-judge-reactivate.inc.php');
// 		        	}
// 		        elseif ($FORM['submit']=='Save')
// 		        	{
// 			        	include('qry-judge-update.inc.php');
// 		        	}
// 		        // get refreshed judge details
// 				include('qry-this-judge.inc.php');
// 		    }
// 		 // edit judge details (form)
//         if (isset($GET['edit']))
//         	{
// 	        	include('judge-edit.inc.php');
//         	}
//     	// or display judge details
//     	else
//     		{
// 	    		include('judge-details.inc.php');
// 	    	}
	    	
//         // show current assignments
//         include('judge-assigned.inc.php');
        
//     }



