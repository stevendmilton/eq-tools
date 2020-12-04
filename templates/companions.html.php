<p>
    <?=$totalCompanions?> companionships(s) have been entered.
    <a href="/public/addcompanionship.php">Add Companionship</a>
</p>

<table>
    <tr>
        <th>District</th>
        <th>Companion&nbsp;1&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Companion&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Date&nbsp;Added</th>
        <th>Last&nbsp;Interview</th>
    </tr>
    <?php foreach($companions as $companion): ?>
    <tr>
        <td>
            <?=htmlspecialchars($companion['district'], 
            ENT_QUOTES, 'UTF-8')?>
        </td>
        <td>
            <?=htmlspecialchars($companion['f1name'], 
            ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars(
                $companion['l1name'],
                ENT_QUOTES,
            'UTF-8'
            ); ?>
        </td>
        <td>
            <?=htmlspecialchars($companion['f2name'], 
            ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars(
                $companion['l2name'],
                ENT_QUOTES,
            'UTF-8'
            ); ?>
        </td>
        <td>
            <?=htmlspecialchars($companion['date_added'],
            ENT_QUOTES, 'UTF-8'); ?>
        </td>
        <td>
            <?=$companion['last_interview'];?>
        </td>
        <td>
            <form action="/public/editcompanionship.php" method="get">
                <input type="hidden" name="id" value="<?=$companion['id']?>">
                <input type="hidden" name="districtid" value="<?=$companion['districtid']?>">
                <input type="hidden" name="companion1" value="<?=$companion['companion1']?>">
                <input type="hidden" name="companion2" value="<?=$companion['companion2']?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="/public/deletecompanionship.php" method="post">
                <input type="hidden" name="id" value="<?=$companion['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
