<h2>Scores</h2>

<?php
// get list of submitted applications
include('qry-applications.inc.php');
echo('<h3>Applications ('.$result->num_rows.')</h3>');
if ($result->num_rows > 0)
    {
        $applications = [];
        // split applications up by category
        while($a = $result->fetch_assoc()) {
            {
                $application_id=$a['id'];
                $score=array(
                    'judges'=>0,
                    'essay'=>0,
                    'bibliography'=>0,
                    'project'=>0,
                    'review'=>0,
                    'completed'=>0,
                    'total'=>0,
                );
                // $my_scores=[];
                include('qry-application-scores.inc.php');
                while($qry_scores->fetch_assoc())
                    {
                        $score['judges']++;
                        $score['essay'] += $s['score_essay'];
                        $score['bibliography'] += $s['score_bibliography'];
                        $score['project'] += $s['score_project'];
                        $score['review'] += $s['score_review'];
                        $score['total'] += $s['score_total'];
                        if($s['score_total']>0) $score['completed']++;
                    }
                $applications[$a['category']][$a['id']]=$a;
                $applications[$a['category']][$a['id']]['scores']=$score;
            }
        
        
        // print_r($applications);
        
        
        foreach($applications as $category=>$applications)
            {
                if (is_string($category)) {

                print('<h2>'.$category.'</h2>');
                print('<table class="form"><tr><th>Name</th><th>Judges/Completed</th><th>Essay</th><th>Project</th><th>Bibliography</th><th>Review</th><th>Total</th><th>Average</th></tr>');
                foreach($applications as $a)
                    {
                        $avg_score = $a['scores']['total']/count($a['scores']);
                        print('<tr>');
                        print('<td><a href="index.php?application='.$a['id'].'">'.$a['name'].'</a></td>');
                        print('<td>'.$a['scores']['judges'].'/'.$a['scores']['completed'].'</td>');
                        print('<td>'.$a['scores']['essay'].'</td>');
                        print('<td>'.$a['scores']['project'].'</td>');
                        print('<td>'.$a['scores']['bibliography'].'</td>');
                        print('<td>'.$a['scores']['review'].'</td>');
                        print('<td>'.$a['scores']['total'].'</td>');
                        print('<td>'.number_format($avg_score,2).'</td>');
                        print('</tr>');
                    } // end foreach application
                
                print('</table>');
                }
            } // end foreach category
    }}
else
    {
        print('<p>No applications.</p>');
    }
    
?>

