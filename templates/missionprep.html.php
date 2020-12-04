<p>
    <?=$totalStudents?> class member(s) have been entered.
    <a href="/public/addmissionprep.php">Add Missionary Prep Student</a>
</p>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date&nbsp;Added</th>
    </tr>
    <?php foreach($students as $student): ?>
    <tr>
        <td>
            <?=htmlspecialchars($student['first_name'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=htmlspecialchars($student['last_name'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=$student['date_added'];?>
        </td>
        <td>
            <form action="/public/deletemissionprep.php" method="post">
                <input type="hidden" name="id" value="<?=$student['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
