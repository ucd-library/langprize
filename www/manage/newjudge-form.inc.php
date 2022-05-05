<div class="form">
    <form action="index.php" method="post">
        <table class="form">
            <tr class="formheader">
                <th colspan="2">Add a New Judge</th>
            </tr>
            <tr>
                <td class="formlabel"><label for="name">Name</label></td>
                <td class="formvalue">
                    <?=form_text('name',50)?>
                </td>
            </tr>
            <tr>
                <td class="formlabel"><label for="kerberos">Kerberos ID</label></td>
                <td class="formvalue">
                    <?=form_text('kerberos',50)?>
                </td>
            </tr>
            <tr>
                <td class="formlabel"><label for="email">Email</label></td>
                <td class="formvalue">
                    <?=form_text('email',50)?>
                </td>
            </tr>
            <tr>
                <td class="formlabel"><label>Categories</label></td>
                <td class="formvalue">
                    <?=form_checkbox('art','Arts/Humanities/Social Sciences')?><br />
                    <?=form_checkbox('sci','Science/Math/Engineering')?><br />
                    <?=form_checkbox('fir','First Year Undergradate')?>
                </td>
            </tr>
            <tr>
                <td class="formsubmit" colspan="2">
                    <input type="submit" name="newjudge" value="Save" class="bigbutton" />
                </td>
            </tr> 
        </table>
    </form>
</div>