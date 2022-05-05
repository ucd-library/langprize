<?php

$score_essay          = intval($FORM['score_essay']);
$score_bibliography   = intval($FORM['score_bibliography']);
$score_review         = intval($FORM['score_review']);
$score_project        = intval($FORM['score_project']);
$updated              = date('Y-m-d G:i:s');

$sql = "UPDATE scores
SET score_essay = $score_essay, score_bibliography = $score_bibliography, score_review = $score_review, score_project = $score_project, updated = '$updated'
WHERE id = $score_id";

if ($conn->query($sql) === TRUE) {
	print('<div class="notice">Scoring Saved</div>');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo('There was a problem assigning this application. Please contact mjwarren@ucdavis.edu');
  include('/var/www/html/footer.inc.php');
  die(); 
}
	
