<p>
    <?=$totalCommitteeMembers?> members(s) have been entered.
    <a href="/public/addcommitteemember.php?committee=<?=$_GET['committee']?>">Add Committee Member</a>
</p>
<table>
    <tr>
        <th>Committee Member</th>
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
            <form action="/public/editcommitteemember.php" method="get">
                <input type="hidden" name="id" value="<?=$elder['id']?>">
                <input type="submit" value="Edit">
                <input type="hidden" name="name" value=<?=$_GET['committee']?>>
            </form>
        </td>
        <td>
            <form action="/public/deletecommitteemember.php" method="get">
                <input type="hidden" name="name" value=<?=$_GET['committee']?>>
                <input type="hidden" name="id" value="<?=$elder['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
