<h2>Scoring (<a href="https://www.library.ucdavis.edu/wp-content/uploads/2017/05/2018-Lang-Prize-Evaluation-Rubric.pdf">View full Rubric</a>)</h2>

<form action="index.php?application=<?=$application_id?>" method="post">

<?php

// populate form with saved scores
$FORM['score_bibliography'] = $qry_score['score_bibliography'];
$FORM['score_essay'] = $qry_score['score_essay'];
$FORM['score_project'] = $qry_score['score_project'];
$FORM['score_review'] = $qry_score['score_review'];
  
// show scoring & criteria    
include('application-scoring-essay.inc.php');
include('application-scoring-project.inc.php');
include('application-scoring-bibliography.inc.php');
include('application-scoring-review.inc.php');

// echo "application id is $application_id";
// echo "judge id is $judge_id";
// echo "score id is $score_id";

?>

<input type="hidden" name="application_id" value="<?=$application_id?>" />
<input type="hidden" name="judge_id" value="<?=$judge_id?>" />
<input type="hidden" name="score_id" value="<?=$score_id?>" />

<div class="center">
    <input type="submit" value="SAVE SCORES" name="submit" class="button big" />
</div>

</form>
<p></p>
<p></p>
