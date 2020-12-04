<p>
    <?=$totalElders?> elder(s) have been entered.
    <a href="/public/addelder.php">Add Quorum Brother</a>
</p>
<table>
    <tr>
        <th>Elder</th>
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
            <?=htmlspecialchars($elder['date_added'],
                ENT_QUOTES, 'UTF-8'); ?>
        </td>
        <td>
            <!--<a href="editname.php?id=<?=$elder['id']?>">
                    Edit</a>-->
            <form action="/public/deleteelder.php" method="post">
                <input type="hidden" name="id" value="<?=$elder['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
