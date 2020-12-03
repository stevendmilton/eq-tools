<p>
    <?=$totalDistricts?> district(s) have been entered.
    <a href="adddistrict.php">Add District</a>
</p>

<table>
    <tr>
        <th>District&nbsp;&nbsp;&nbsp;</th>
        <th>District&nbsp;Leader&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Date&nbsp;Added</th>
        <th>Last&nbsp;Updated</th>
    </tr>
    <?php foreach($districts as $district): ?>
    <tr>
        <td>
            <?=$district['district']?>
        </td>
        <td>
            <?=htmlspecialchars($district['first_name'], 
                ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars(
                    $district['last_name'],
                    ENT_QUOTES,
                'UTF-8'
                ); ?>
        </td>
        <td>
            <?=htmlspecialchars($district['date_added'], 
                ENT_QUOTES, 'UTF-8')?>
        </td>
        <td>
            <?=htmlspecialchars($district['date_updated'],
                ENT_QUOTES, 'UTF-8'); ?>
        </td>
        <td>
            <form action="editdistrict.php" method="get">
                <input type="hidden" name="leader" value="<?=$district['leader']?>">
                <input type="hidden" name="district" value="<?=$district['id']?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="deletedistrict.php" method="get">
                <input type="hidden" name="id" value="<?=$district['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
