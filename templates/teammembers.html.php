<p>
    <?=$totalTeamMembers?> members(s) have been entered.
    <a href="/public/addteammember.php?team=<?=$_GET['team']?>">Add Team Member</a>
</p>
<table>
    <tr>
        <th>Team Member</th>
        <th>Leader?</th>
        <th>Date&nbsp;Added</th>
    </tr>
    <?php foreach($elders as $elder): ?>
    <tr>
        <td>
            <?=htmlspecialchars($elder['first_name'], 
                ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars(
                    $elder['last_name'],
                    ENT_QUOTES,
                'UTF-8'
                ); ?>
        </td>
        <td>
            <?php if($elder['leader']) {echo 'Y';} else {echo 'N';}?>
        </td>
        <td>
            <?=htmlspecialchars($elder['date_added'],
                ENT_QUOTES, 'UTF-8'); ?>
        </td>
        <td>
            <form action="/public/editteammember.php" method="get">
                <input type="hidden" name="id" value="<?=$elder['id']?>">
                <input type="submit" value="Edit">
                <input type="hidden" name="name" value=<?=$_GET['team']?>>
            </form>
        </td>
        <td>
            <form action="/public/deleteteammember.php" method="get">
                <input type="hidden" name="name" value=<?=$_GET['team']?>>
                <input type="hidden" name="id" value="<?=$elder['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
