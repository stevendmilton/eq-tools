<p>
    <?=$totalMembers?> class member(s) have been entered.
    <a href="/public/addclassmember.php?class=<?=$_GET['class']?>">Add Class Member</a>
</p>

<table>
    <tr>
        <th>Class&nbsp;Date</th>
        <th>First&nbsp;Name</th>
        <th>Last&nbsp;Name</th>
        <th>Date&nbsp;Added</th>
    </tr>
    <?php foreach($members as $member): ?>
    <tr>
        <td><?=$member['class_date']?></td>
        <td><?=$member['first_name']?></td>
        <td><?=$member['last_name']?></td>
        <td><?=$member['date_added'];?></td>
        <td>
            <form action="/public/deleteclassmember.php" method="get">
                <input type="hidden" name="id" id="id" value="<?=$member['id']?>">
                <input type="hidden" name="class" id="class" value="<?=$_GET['class'];?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
