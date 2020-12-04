<p>
    <?=$totalMissionaries?> missionary(s) have been entered.
    <a href="/public/addmissionary.php">Add Missionary</a>
</p>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Fulltime/Ward?</th>
        <th>Date&nbsp;Added</th>
    </tr>
    <?php foreach($missionarys as $missionary): ?>
    <tr>
        <td>
            <?=htmlspecialchars($missionary['first_name'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=htmlspecialchars($missionary['last_name'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?php if($missionary['fulltime']) {echo 'Fulltime';} else {echo 'Ward';};?>
        </td>
        <td>
            <?=$missionary['date_added'];?>
        </td>
        <td>
            <form action="/public/editmissionary.php" method="get">
                <input type="hidden" name="id" value="<?=$missionary['id']?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="/public/deletemissionary.php" method="post">
                <input type="hidden" name="id" value="<?=$missionary['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
