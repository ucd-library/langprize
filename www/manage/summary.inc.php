<h2>Summary</h2>

<?php
// process newjudge form if submitted  
if (isset($FORM['newjudge']))
    { 
        include('newjudge-validate.inc.php');
        if (isset($errors) and count($errors))
            {
                echo_errors($errors,"Please correct these errors to add the new Judge");
            }
        else
            {
                include('qry-newjudge-duplicate.inc.php');
                if ($duplicate<0)
                    { $message="Error: problem saving new judge. Please contact mdbavister@ucdavis.edu if this continues";}
                elseif ($duplicate>0)
                    { $message="This judge has already been added"; }
                else
                    { include('qry-newjudge-save.inc.php'); }
                echo('<div class="notice"><h3>'.$message.'</h3></div>');
            }
        
        
    }  
    
    

// get list of submitted applications
include('qry-applications.inc.php');
echo('<h3>Applications ('. $result->num_rows. ')</h3>');
if ($result->num_rows > 0) {
        echo('<table class="form"><tr><th>Name</th><th>Kerberos</th><th>Submitted</th>'.
        '<th>Category</th><th>Letter</th><th>Judges</th><th>Completed</th><th>Score</th></tr>');
        while($row = $result->fetch_assoc()) {
                $application_id=$row['id'];
                include('qry-summary-scores.inc.php');
                $num_judges = $qry_scores->num_rows;
                $num_scored = 0;
                $total_score = 0;
                while($s = $qry_scores->fetch_assoc())
                    {
                        if ($s['score_essay']>0) $num_scored++;
                        $total_score += (($s['score_essay']+$s['score_project']+$s['score_bibliography']+$s['score_review'])/$num_judges);                         
                    }
                
                echo('<tr>');
                echo('<td><a href="index.php?application='.$row['id'].'">'.$row['name'].'</a></td>');
                echo('<td>'.$row['kerberos'].'</td>');
                echo('<td>'.date('m/d/Y',strtotime($row['submitted'])).'</td>');
                echo('<td>'.strtoupper(substr($row['category'],0,3)).'</td>');
                echo('<td>'.(strlen($row['sponsor'])?'Yes':'-').'</td>');
                echo('<td>'.$num_judges.'</td>');
                echo('<td>'.$num_scored.'</td>');
                if ($num_scored>0)
                    {
                        echo('<td>'.number_format($total_score, 2).'</td>');
                    }
                else
                    {
                        echo('<td>-</td>');
                    }
                echo('</tr>');
            }
        
        echo('</table>');
    }

else
    {
        echo('<p>No applications.</p>');
    }


// get list of judges
include('qry-judges.inc.php');
echo('<h3>Judges ('.$judges->num_rows.')</h3>');
if ($judges->num_rows > 0) {
        echo('<table class="form"><tr><th>Name</th><th>Kerberos</th><th>Area</th><th>Assigned</th><th>Completed</th></tr>');
        while($row = $judges->fetch_assoc()) {
                $judge_id=$row['id'];

                include('qry-judge-assigned.inc.php');

                $qry_assigned_total = $judge_ass->num_rows;

                if ($judge_ass->num_rows > 0) {
                    $qry_assigned_completed = 0;

                    while ($q = $judge_ass->fetch_assoc()) {
                        if($q['score_essay']>0) $qry_assigned_completed++; 
                        $qry_assigned[$q['applications_id']]=$q;
                    }
                }
                else {
                    $qry_assigned_completed = 0;
                }

                $area='';
                if ($row['art']==1) $area .= 'Art ';
                if ($row['sci']==1) $area .= 'Sci ';
                if ($row['fir']==1) $area .= '1st ';
                if ($area=='') $area='-';
                echo('<tr>');
                echo('<td><a href="index.php?judge='.$row['kerberos'].'">'.$row['name'].'</a></td>');
                echo('<td>'.$row['kerberos'].'</td>');
                echo('<td>'.$area.'</td>');

                echo('<td>'.$qry_assigned_total.'</td>');
                echo('<td>'.$qry_assigned_completed.'</td>');

                echo('</tr>');
            }
        
        echo('</table>');
    }

else
    {
        echo('<p>No judges yet. Please add and assign to applications.</p>');
    }
echo('<p></p>');    
include('newjudge-form.inc.php');    
    
?>

