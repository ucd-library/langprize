<h2>Scores</h2>

<?php
// get list of submitted applications
$category = 'Arts/Humanities/Social Sciences';
include('qry-applications-by-category.inc.php');
echo('<h2>'.$category.'</h2>');
echo('<h3>Applications ('. $result->num_rows. ')</h3>');
if ($result->num_rows > 0) {
      echo('<table class="form"><tr><th>Name</th><th>Judges/Completed</th><th>Essay</th><th>Project</th><th>Bibliography</th><th>Review</th><th>Total</th><th>Average</th></tr>');
        while($row = $result->fetch_assoc()) {
                $application_id=$row['id'];
                include('qry-summary-scores.inc.php');
                $num_judges = $qry_scores->num_rows;
                $num_scored = 0;
                $total_score = 0;
                while($s = $qry_scores->fetch_assoc())
                    {
                        if ($s['score_essay']>0) $num_scored++;
                        $total_score += $s['score_essay']+$s['score_project']+$s['score_bibliography']+$s['score_review'];
                        $score_essay += isset($s['score_essay']) ? $s['score_essay'] : 0;
                        $score_project += isset($s['score_project']) ? $s['score_project'] : 0;
                        $score_bibliography += isset($s['score_bibliography']) ? $s['score_bibliography'] : 0;
                        $score_review += isset($s['score_review']) ? $s['score_review'] : 0;
                      
                    }
                    $divisor = $num_scored > 0 ? $num_scored : 1;
                    $average_score =  $total_score / $divisor; 
                    print('<tr>');
                    echo('<td><a href="index.php?application='.$row['id'].'">'.$row['name'].'</a></td>');
                    print('<td>'.$num_judges.'/'.$num_scored.'</td>');
                    print('<td>'.$score_essay.'</td>');
                    print('<td>'.$score_project.'</td>');
                    print('<td>'.$score_bibliography.'</td>');
                    print('<td>'.$score_review.'</td>');
                if ($num_scored>0)
                    {
                        echo('<td>'.round($total_score).'</td>');
                        echo('<td>'.number_format($average_score, 2).'</td>');
                    }
                else
                    {
                        echo('<td>-</td><td>-</td>');
                    }
                echo('</tr>');
            }
        
        echo('</table>');
    }

else
    {
        echo('<p>No applications.</p>');
    }

    $category = 'Science/Engineering/Math';
    include('qry-applications-by-category.inc.php');
    echo('<h2>'.$category.'</h2>');
    echo('<h3>Applications ('. $result->num_rows. ')</h3>');
    if ($result->num_rows > 0) {
        echo('<table class="form"><tr><th>Name</th><th>Judges/Completed</th><th>Essay</th><th>Project</th><th>Bibliography</th><th>Review</th><th>Total</th><th>Average</th></tr>');
          while($row = $result->fetch_assoc()) {
                  $application_id=$row['id'];
                  include('qry-summary-scores.inc.php');
                  $num_judges = $qry_scores->num_rows;
                  $num_scored = 0;
                  $total_score = 0;
                  while($s = $qry_scores->fetch_assoc())
                      {
                          if ($s['score_essay']>0) $num_scored++;
                          $total_score += $s['score_essay']+$s['score_project']+$s['score_bibliography']+$s['score_review'];
                          $score_essay += isset($s['score_essay']) ? $s['score_essay'] : 0;
                          $score_project += isset($s['score_project']) ? $s['score_project'] : 0;
                          $score_bibliography += isset($s['score_bibliography']) ? $s['score_bibliography'] : 0;
                          $score_review += isset($s['score_review']) ? $s['score_review'] : 0;
                        
                      }
                      $divisor = $num_scored > 0 ? $num_scored : 1;
                      $average_score =  $total_score / $divisor; 
                      print('<tr>');
                      echo('<td><a href="index.php?application='.$row['id'].'">'.$row['name'].'</a></td>');
                      print('<td>'.$num_judges.'/'.$num_scored.'</td>');
                      print('<td>'.$score_essay.'</td>');
                      print('<td>'.$score_project.'</td>');
                      print('<td>'.$score_bibliography.'</td>');
                      print('<td>'.$score_review.'</td>');
                  if ($num_scored>0)
                      {
                          echo('<td>'.round($total_score).'</td>');
                          echo('<td>'.number_format($average_score, 2).'</td>');
                      }
                  else
                      {
                          echo('<td>-</td><td>-</td>');
                      }
                  echo('</tr>');
              }
          
          echo('</table>');
      }