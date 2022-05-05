<?php
    
// get information about this application
include('../includes/qry-applications.inc.php');
include('../includes/qry-application-scores.inc.php');

// echo "application id is $application_id";
// echo $qry_applications->num_rows;

// if not found show error and link back to summary screen
if ($qry_applications->num_rows === 0) {
        print('<div class="error"><h3>Error: Unable to find this application</h3>
        <p>Please go back to the <a href="index.php">Summary Page</a></p>
        </div>');
    }
// make sure this application is assigned to this judge
else if ($qry_application_scores->num_rows === 0) {
        print('<div class="error"><h3>Error: This application is not assigned to you.</h3>
        <p>Please go back to the <a href="index.php">Summary Page</a></p>
        </div>');    
    }
// show details about judge & allow editting 
else
    {

        if (($qry_applications->num_rows > 0) && ($qry_application_scores->num_rows > 0)) {

            while($qry_application = mysqli_fetch_assoc($qry_applications)) {
                while($qry_application_score = mysqli_fetch_assoc($qry_application_scores)) {
                    if ($qry_application['id'] === $qry_application_score['applications_id']) {
                        $score_id = $qry_application_score['id'];
                    }
                }

                $application_id=$qry_application['id'];
                // $score_id=$qry_application_scores['id'];
                // save scores if form submitted
                if (isset($FORM['submit']) and strlen($FORM['submit']))
                    {
                        include('../includes/qry-save-score.inc.php');
                    }        
                // display judge details
                include('application-details.inc.php');
        
        
                if (strlen($qry_application['file_letter']))
                    {
                        include('application-scoring.inc.php');
                    }
                } 

            }


            else
            {
                print('<h2>Scoring not available yet. Waiting for Instructor Review Letter</h2>');
            }       

        }



    


    

?>
