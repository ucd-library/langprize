<h2>Applications assigned to <?=$judge_name?></h2>

<?php

include('../includes/qry-judge-assigned.inc.php');

  if ($judge_ass->num_rows > 0) {

        print('<table class="form"><tr><th>Author</th><th>Project</th><th>Category</th><th>Essay</th><th>Project</th><th>Biblio</th><th>Review</th><th>Total</th><th>&nbsp;</th></tr>');
        while($row = mysqli_fetch_assoc($judge_ass)) {
            // print("<pre>".print_r($row,true)."</pre>");
                print('<tr>');
                print('<td>'.$row['name'].'</td>');
                print('<td>'.$row['title'].'</td>');
                print('<td>'.strtoupper(substr($row['category'],0,3)).'</td>');
                print('<td>'.intval($row['score_essay']).'</td>');
                print('<td>'.intval($row['score_project']).'</td>');
                print('<td>'.intval($row['score_bibliography']).'</td>');
                print('<td>'.intval($row['score_review']).'</td>');
                print('<td>'.intval($row['score_total']).'</td>');
                if (strlen($row['file_letter']))
                    { print('<td><a href="index.php?application='.$row['applications_id'].'" class="button"">SCORE</a></td>'); }
                else
                    { print('<td><a href="index.php?application='.$row['applications_id'].'" class="button"">PREVIEW</a></td>'); }
                print('</tr>');
            }
        
        print('</table>');
    }
else
    {
        print('<p>No applications have been assigned to you yet.</p>');
    }

?>