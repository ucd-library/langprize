<h3> Assigned Applications </h3>
<?php

// get list of assigned applications
include('../includes/qry-judge-assigned.inc.php');

$assigned = [];

if ($judge_ass->num_rows > 0) {
    print('<table class="form">');
    while($app = $judge_ass->fetch_assoc()) {

        print('<tr>');
        print('<td>'.$app['name'].'</td>');
        print('<td>'.$app['title'].'</td>');
        print('<td>'.$app['category'].'</td>');
        if ($app['score_total']>0)
            { print('<td>Scored: '.$app['score_total'].'</td>'); }
        else
            { print('<td><a class="button" href="index.php?judge='.$GET['judge'].'&unassign='.$app['applications_id'].'">Unassign</a></td>'); }
        print('</tr>');
        array_push($assigned, $app['applications_id']);

    }

    print('</table>');

}
else {
    print('<p>No applications assigned to this judge</p>');
}


// show list of eligible applications not assigned to this judge
include('qry-applications.inc.php');

if ($result->num_rows > 0) {
 
print('<h3>Applications not assigned to this Judge</h3>');
print('<table class="form">');
    while($app = $result->fetch_assoc()) {
        if (!in_array($app['id'],$assigned)) {
            print('<tr>');
            print('<td>'.$app['name'].'</td>');
            print('<td>'.$app['title'].'</td>');
            print('<td>'.$app['category'].'</td>');
            print('<td><a class="button" href="index.php?judge='.$GET['judge'].'&assign='.$app['id'].'">Assign</a></td>');
            print('</tr>');
        }

        }
print('</table>');
}
else {
    print('<p>No applications not assigned to this judge</p>');
}