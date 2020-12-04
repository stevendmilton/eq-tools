<p>
    <?=$totalMembers?> trip member(s) have been entered.
    <a href="/public/addtripmember.php?trip=<?=$_GET['trip']?>">Add Trip Member</a>
</p>

<table>
    <tr>
        <th>Trip&nbsp;Date</th>
        <th>First&nbsp;Name</th>
        <th>Last&nbsp;Name</th>
        <th>Date&nbsp;Added</th>
    </tr>
    <?php foreach($members as $member): ?>
    <tr>
        <td><?=$member['trip_date']?></td>
        <td><?=$member['first_name']?></td>
        <td><?=$member['last_name']?></td>
        <td><?=$member['date_added'];?></td>
        <td>
            <form action="/public/deletetripmember.php" method="get">
                <input type="hidden" name="id" id="id" value="<?=$member['id']?>">
                <input type="hidden" name="trip" id="trip" value="<?=$_GET['trip'];?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
