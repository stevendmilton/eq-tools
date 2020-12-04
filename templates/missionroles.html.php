<p>
    <?=$totalRoles?> Ward Mission Role(s) have been entered.
    <a href="/public/addmissionrole.php">Add Role</a>
</p>
<table>
    <tr>
        <th>Mission Role</th>
        <th>Member Name</th>
        <th>Date&nbsp;Called</th>
    </tr>
    <?php foreach($roles as $role): ?>
    <tr>
        <td>
            <?=htmlspecialchars($role['role'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=htmlspecialchars($role['member'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=$role['date_called'];?>
        </td>
        <td>
            <form action="e/public/ditmissionrole.php" method="get">
                <input type="hidden" name="id" value="<?=$role['id']?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="/public/deletemissionrole.php" method="post">
                <input type="hidden" name="id" value="<?=$role['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
