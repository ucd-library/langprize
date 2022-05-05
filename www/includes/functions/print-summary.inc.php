<? 
function printSummary() {
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
}