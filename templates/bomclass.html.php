<p>
    <?=$totalMembers?> class members(s) have been entered.
    <a href="addbommember.php">Add Class Member</a>
</p>
<table>
    <tr>
        <th>Member Name</th>
        <th>Date&nbsp;Added</th>
    </tr>
    <?php foreach($members as $member): ?>
    <tr>
        <td>
            <?=htmlspecialchars($member['member'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=$member['date_added'];?>
        </td>
        <td>
            <form action="/public/deletebommember.php" method="post">
                <input type="hidden" name="id" value="<?=$member['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
