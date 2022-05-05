
<h2> Judges </h2>

<?php
// get list of assigned judges & their scores
include('qry-application-scores.inc.php');



    if ($qry_scores->num_rows > 0)   {
    print('<table class="form">');
    print('<tr><th>Judge</th><th>Essay</th><th>Project</th><th>Bibliography</th><th>Letter</th><th>Total</th><th>&nbsp;</th></tr>');
 
        // split applications up by category
        while($s = $qry_scores->fetch_assoc()) {
            print('<tr>');
            print('<td>'.$s['judge'].'</td>');
            print('<td>'.$s['score_essay'].'</td>');
            print('<td>'.$s['score_project'].'</td>');
            print('<td>'.$s['score_bibliography'].'</td>');
            print('<td>'.$s['score_review'].'</td>');
            print('<td>'.$s['score_total'].'</td>');
            if (is_null($s['score_total']) or $s['score_total']<1)
                { print('<td><a class="button" href="index.php?judge='.$s['judgekerberos'].'&unassign='.$application_id.'">Unassign</a></td>'); }
            else
                { print('<td>&nbsp;</td>'); }
            print('</tr>');
        }
        print('</table>');

    }
    else {
        print('<p><strong>No judges assigned yet</strong></p>');

    }

?>

    
    
