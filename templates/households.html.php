<p>
    <?=$totalHouseholds?> household(s) have been entered.
    <a href="/public/addhousehold.php">Add Household</a>
</p>
<table>
    <tr>
        <th>Surname</th>
        <th>District</th>
        <th>Single&nbsp;Sister?</th>
        <th>Priesthood in the Home?</th>
        <th>Part Member?</th>
        <th>Date&nbsp;Added</th>
        <th>Assigned&nbsp;Ministering&nbsp;Brothers</th>
    </tr>
    <?php foreach($households as $household): ?>
    <tr>
        <td>
            <?=htmlspecialchars($household['surname'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=htmlspecialchars($household['districtname'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?php if($household['single_sister']) {echo 'Y';} else {echo 'N';}?>
        </td>
        <td>
            <?php if($household['priesthood']) {echo 'Y';} else {echo 'N';}?>
        </td>
        <td>
            <?php if($household['part_member']) {echo 'Y';} else {echo 'N';}?>
        </td>
        <td>
            <?=$household['date_added'];?>
        </td>
        <td>
            <?php if(isset($household['f1name'])) {
                echo $household['f1name'] . " " . $household['l1name'] . "/" . $household['f2name'] . " " . $household['l2name'];
            } else {echo 'No Ministering Brothers';}?>
        </td>
        <td>
            <form action="/public/edithousehold.php" method="get">
                <input type="hidden" name="id" value="<?=$household['id']?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="/public/deletehousehold.php" method="post">
                <input type="hidden" name="id" value="<?=$household['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
