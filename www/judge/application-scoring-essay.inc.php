<table class="form">
    <tr>
        <th class="nowrap">Reflective Essay (25 points)</th>
        <th align="right" style="text-align:right;">
            <select name="score_essay" class="big">
                <?php
                    for ($i=0;$i<=25;$i++)
                        { print(form_option('score_essay',$i));}
                ?>
            </select>
        </th>
    </tr>
    <tr>
        <td> <h4>Accomplished (18-25)</h4> </td>
        <td>
            <ul>
                <li>Search strategies are sufficiently well-described to assess search plan, execution and evaluation of results.</li>
                <li>Displays clear criteria for evaluation of sources selected</li>
                <li>Demonstrates a good awareness of diverse viewpoints/influences.</li>
                <li>Makes a strong case for the importance or originality of the ideas presented in this work.</li>
            </ul>
        </td>
    </tr>
    <tr>        
        <td> <h4>Proficient/Competent (9-17)</h4> </td>
        <td>
            <ul>
                <li>Search strategies are described generally.</li>
                <li>Criteria for evaluation of selected sources incomplete or unclear.</li>
                <li>Demonstrates a limited awareness of other viewpoints/influences.</li>
                <li>Distinguishes own original contribution from that of others.</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td> <h4>Developing (0-8)</h4> </td>
        <td>
            <ul>
                <li>Search strategies omitted or contain insufficient detail to assess search plan, execution and evaluation of results.</li>
                <li>Does not identify criteria for evaluation of selected sources.</li>
                <li>Does not demonstrate an awareness of other viewpoints/influences.</li>
                <li>Does not evaluate own ideas or those encountered in the scholarship.</li>
            </ul>
        </td>
    </tr>
</table>

<p></p>