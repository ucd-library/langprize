
<h2>Application Details</h2>

<table class="form">
    <tr>
        <th colspan="2">Project</th>
    </tr>
    <tr>
        <td>Year</td>
        <td><?=$a['year']?></td>
    </tr>
    <tr>
        <td>Category</td>
        <td><?=$a['project_category']?></td>
    </tr>
    <tr>
        <td>Title</td>
        <td><?=$a['project_title']?></td>
    </tr>
    <tr>
        <td>Completed</td>
        <td><?=$a['project_completed']?></td>
    </tr>
    <tr>
        <th colspan="2">Author(s)</th>
    </tr>
    <?php 
        for ($i=1;$i<=6;$i++)
            {
                if (strlen($a['author_'.$i.'_last']))
                    {
                        print('<tr>');
                        print('<td>#'.$i.'</td>');
                        print('<td>');
                        print($a['author_'.$i.'_last'].', '.$a['author_'.$i.'_first'].' ');
                        print('(ID:'.$a['author_'.$i.'_studentid'].') ');
                        print($a['author_'.$i.'_email'].' ');
                        if (isset($a['author_'.$i.'_personal']))
                            { print(' or '.$a['author_'.$i.'_personal'].' '); }
                        
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
        <td><?=$a['course_department']?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?=$a['course_name']?></td>
    </tr>
    <tr>
        <td>Number</td>
        <td><?=$a['course_number']?></td>
    </tr>
    <tr>
        <th colspan="2">Reviewer</th>
    </tr>
    <tr>
        <td>Name</td>
        <td><?=$a['sponsor_last']?>, <?=$a['sponsor_first']?></td>
    </tr>
    <tr>
        <td>Department</td>
        <td><?=$a['sponsor_department']?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?=$a['sponsor_email']?></td>
    </tr>
    <tr>
        <th colspan="2">Supporting Files</th>
    </tr>
    <tr>
        <td>Main Project</td>
        <td>
            <?php
                if (strlen($a['file_project']))
                    { print('<a href="/applications/'.$a['file_project'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
    <tr>
        <td>Reflective Essay</td>
        <td>
            <?php
                if (strlen($a['file_essay']))
                    { print('<a href="/applications/'.$a['file_essay'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
    <tr>
        <td>Bibliography</td>
        <td>
            <?php
                if (strlen($a['file_bibliography']))
                    { print('<a href="/applications/'.$a['file_bibliography'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
    <tr>
        <td>Support Letter</td>
        <td>
            <?php
                if (strlen($a['file_letter']))
                    { print('<a href="/applications/'.$a['file_letter'].'">DOWNLOAD</a>'); }
                else
                    { print('---'); }
            ?>
        </td>
    </tr> 
</table>   
 

 
    
    
    
