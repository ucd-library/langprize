<table class="form">
    <tr>
        <th class="nowrap">Bibliography (10 points)</th>
        <th align="right" style="text-align:right;">
            <select name="score_bibliography" class="big">
                <?php
                    for ($i=0;$i<=10;$i++)
                        { print(form_option('score_bibliography',$i));}
                ?>
            </select>
        </th>
    </tr>
    <tr>
        <td> <h4>Accomplished (8-10)</h4> </td>
        <td>
            <ul>
                <li>Appropriately uses sources that display a rich diversity of content, provenance and/or format.</li>
                <li>Sources display the ability to dig beneath the surface of information in the search for relevant material.</li>
                <li>Citations are accurate, complete and standardized (a few formatting errors can be forgiven).</li>
            </ul>            
        </td>
    </tr>
    <tr>
        <td> <h4>Proficient/Competent (4-7)</h4> </td>
        <td>
            <ul>
                <li>Uses a range of sources appropriate to the topic.</li>
                <li>Sources generally meet assignment requirements, but may lack breadth, rigor or relevance.</li>
                <li>Some citations are incomplete or unstandardized.</li>
            </ul>            
        </td>
    </tr>
    <tr>    
        <td> <h4>Developing (0-3)</h4> </td>
        <td>
            <ul>
                <li>Relies on too few sources.</li>
                <li>Unclear why some sources were selected.</li>
                <li>Many citations are incomplete (lacking sufficient information to locate the source cited) or unstandardized (lacking a consistent style).</li>
            </ul>            
        </td>
    </tr>
</table>

<p></p>