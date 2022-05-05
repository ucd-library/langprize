<table class="form">
    <tr>
        <th class="nowrap">Research Paper or Creative Project<br />(10 points)</th>
        <th align="right" style="text-align:right;">
            <select name="score_project" class="big">
                <?php
                    for ($i=0;$i<=10;$i++)
                        { print(form_option('score_project',$i));}
                ?>
            </select>
        </th>
    </tr>
    <tr>
        <td> <h4>Accomplished (8-10)</h4> </td>
        <td>
            <ul>
                <li>Uses sources appropriately in support of argument/thesis.</li>
                <li>Contextualizes and uses numerical data or primary sources appropriately.</li>
                <li>Integrates well-selected quotes and acquired ideas into argument.</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td> <h4>Proficient/Competent (4-7)</h4> </td>
        <td>
            <ul>
                <li>Some claims or assertions lack references.</li>
                <li>Uses data or primary sources occasionally inappropriately or, at times, poorly integrated into argument.</li>
                <li>Uses quotes or acquired ideas generally appropriately, but could have been better selected or synthesized for conciseness/originality.</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td> <h4>Developing (0-3)</h4> </td>
        <td>
            <ul>
                <li>Unsupported claims or assertions.</li>
                <li>Data or primary sources not used appropriately, e.g. primary data obtained from secondary sources.</li>
                <li>Poorly selected quotes (e.g. from sources that do not support applicant’s argument or address point) or displays heavy reliance on quotes instead of synthesizing material.</li>
            </ul>
        </td>
    </tr>
</table>

<p></p>