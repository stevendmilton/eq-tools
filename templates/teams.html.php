<p>
    <?=$totalTeams?> team(s) have been entered.
    <a href="/public/addteam.php">Add Team</a>
</p>

<table>
    <tr>
        <th>Team&nbsp;&nbsp;</th>
        <th>Date&nbsp;Added</th>
    </tr>
    <?php foreach($teams as $team): ?>
    <tr>
        <td>
            <?=htmlspecialchars($team['name'], 
                ENT_QUOTES, 'UTF-8')?>
        </td>
        <td>
            <?=htmlspecialchars($team['date_added'], 
                ENT_QUOTES, 'UTF-8')?>
        </td>
        <td>
            <form action="/public/deleteteam.php" method="post">
                <input type="hidden" name="id" value="<?=$team['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
