<table class="form">
    <tr>
        <th class="nowrap">Instructor Review (5 points)</th>
        <th align="right" style="text-align:right;">
            <select name="score_review" class="big">
                <?php
                    for ($i=0;$i<=5;$i++)
                        { print(form_option('score_review',$i));}
                ?>
            </select>
        </th>
    </tr>
    <tr>
        <td colspan="2">
            The instructor assesses the work as accomplished, proficient or developing. The instructor...
        </td>
    </tr>
    <tr>
        <td> <h4>Accomplished (4-5)</h4> </td>
        <td>
            <ul>
                <li>explains the content and quality of the paper or project as relevant to questions within the discipline, i.e., the work exhibits originality, comprehensiveness and/or is unique.</li>
                <li>indicates the work as appropriate and addresses the thorough use of research materials throughout the paper or project.</li>
                <li>addresses the initiative shown by student in identifying most of the key resources. Explains in what way the student used the library collections or services in a creative and/or flexible manner.</li>
            </ul>            
        </td>
    </tr>
    <tr>
        <td> <h4>Proficient/Competent (2-3)</h4> </td>
        <td>
            <ul>
                <li>indicates the work has some relevance, but generally takes a familiar path, OR that the work exhibits limited originality, comprehensiveness and/or uniqueness.</li>
                <li>indicates that the work makes limited use of research materials throughout the paper or project.</li>
                <li>indicates that student showed limited initiative in identifying the key resources or use of library collections or services.</li>
            </ul>            
        </td>
    </tr>
    <tr>    
        <td> <h4>Developing (0-1)</h4> </td>
        <td>
            <ul>
                <li>points to little or no relevance in topic, or expresses doubt about, the quality of the paper or project.</li>
                <li>does not discuss, or expresses doubt about, the appropriate use of research materials throughout the paper or project.</li>
                <li>does not discuss, or expresses doubt about, the identification of key resources or use of library collections or services.</li>
            </ul>            
        </td>
    </tr>
</table>

<p></p>

