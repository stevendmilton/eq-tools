<p>
    <?=$totalCommittees?> committee(s) have been entered.
    <a href="addcommittee.php">Add Committee</a>
</p>

<table>
    <tr>
        <th>Committee&nbsp;&nbsp;</th>
        <th>Date&nbsp;Added</th>
        <th>Last&nbsp;Updated</th>
    </tr>
    <?php foreach($committees as $committee): ?>
    <tr>
        <td>
            <?=htmlspecialchars($committee['name'], 
                ENT_QUOTES, 'UTF-8')?>
        </td>
        <td>
            <?=htmlspecialchars($committee['date_added'], 
                ENT_QUOTES, 'UTF-8')?>
        </td>
        <td>
            <form action="deletecommittee.php" method="post">
                <input type="hidden" name="id" value="<?=$committee['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
