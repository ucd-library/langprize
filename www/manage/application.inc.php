<?php
    
// get information about this application
include('qry-this-application.inc.php');

    if ($qry_application->num_rows > 0)
    {
        // split applications up by category
        while($a = $qry_application->fetch_assoc()) {
            $application_id=$a['id'];
            // display application details
            include('application-details.inc.php');
            // show assigned judges & scores
            include('application-scores.inc.php');
            
            // actions 
                    
            // allow viewing the scoring (eventually)
        }
    }
        else {
            print('<div class="error"><h3>Error: Unable to find this application</h3>
            <p>Please go back to the <a href="index.php">Summary Page</a></p>
            </div>');
        }

?>
