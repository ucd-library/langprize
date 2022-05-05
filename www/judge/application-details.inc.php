
<h2>Application Details</h2>

<table class="form">
    <tr>
        <th colspan="2">Project</th>
    </tr>
    <tr>
        <td>Year</td>
        <td><?=$qry_application['year']?></td>
    </tr>
    <tr>
        <td>Category</td>
        <td><?=$qry_application['project_category']?></td>
    </tr>
    <tr>
        <td>Title</td>
        <td><?=$qry_application['project_title']?></td>
    </tr>
    <tr>
        <td>Completed</td>
        <td><?=$qry_application['project_completed']?></td>
    </tr>
    <tr>
        <th colspan="2">Author(s)</th>
    </tr>
    <?php 
        for ($i=1;$i<=6;$i++)
            {
                if (strlen($qry_application['author_'.$i.'_last']))
                    {
                        print('<tr>');
                        print('<td>#'.$i.'</td>');
                        print('<td>');
                        print($qry_application['author_'.$i.'_last'].', '.$qry_application['author_'.$i.'_first'].' ');
                        print('(ID:'.$qry_application['author_'.$i.'_studentid'].') ');
                        print($qry_application['author_'.$i.'_email'].' ');
                        if (isset($qry_application['author_'.$i.'_personal']))
                            { print(' or '.$qry_application['author_'.$i.'_personal'].' '); }
                        
                        print('</td>');
                        print('</tr>');
                    }
            }
    ?>
    <tr>
        <th colspan="2">Course</th>
    </tr>
    <tr>
        <td>Department</td>
        <td><?=$qry_application['course_department']?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?=$qry_application['course_name']?></td>
    </tr>
    <tr>
        <td>Number</td>
        <td><?=$qry_application['course_number']?></td>
    </tr>
    <tr>
        <th colspan="2">Reviewer</th>
    </tr>
    <tr>
        <td>Name</td>
        <td><?=$qry_application['sponsor_last']?>, <?=$qry_application['sponsor_first']?></td>
    </tr>
    <tr>
        <td>Department</td>
        <td><?=$qry_application['sponsor_department']?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?=$qry_application['sponsor_email']?></td>
    </tr>
    <tr>
        <th colspan="2">Supporting Files</th>
    </tr>
    <tr>
        <td>Main Project</td>
        <td>
            <?php
                if (strlen($qry_application['file_project']))
                    { print('<a href="/applications/'.$qry_application['file_project'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
    <tr>
        <td>Reflective Essay</td>
        <td>
            <?php
                if (strlen($qry_application['file_essay']))
                    { print('<a href="/applications/'.$qry_application['file_essay'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
    <tr>
        <td>Bibliography</td>
        <td>
            <?php
                if (strlen($qry_application['file_bibliography']))
                    { print('<a href="/applications/'.$qry_application['file_bibliography'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
    <tr>
        <td>Additional Documentation</td>
        <td>
            <?php
                if (strlen($qry_application['file_additional']))
                    { print('<a href="/applications/'.$qry_application['file_additional'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
    <tr>
        <td>Support Letter</td>
        <td>
            <?php
                if (strlen($qry_application['file_letter']))
                    { print('<a href="/applications/'.$qry_application['file_letter'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
</table>   
 
 
    
    
    
