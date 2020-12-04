<p>
    <?=$totalTrips?> temple trip(s) have been entered.
    <a href="/public/addtrip.php">Add Trip</a>
</p>

<table>
    <tr>
        <th>Trip&nbsp;Date</th>
        <th>Show&nbsp;In&nbsp;Menu</th>
        <th>Date&nbsp;Added</th>
        <th>Last&nbsp;Updated</th>
    </tr>
    <?php foreach($trips as $trip): ?>
    <tr>
        <td><?=$trip['trip_date']?></td>
        <td>
            <?php if($trip['showmenu']) {echo "            Y";} else {echo "N";};?>
        </td>
        <td>
            <?=$trip['date_added'];?>
        </td>
        <td>
            <?=$trip['date_updated'];?>
        </td>
        <td>
            <form action="/public/edittrip.php" method="get">
                <input type="hidden" name="id" value="<?=$trip['id']?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="/public/deletetrip.php" method="post">
                <input type="hidden" name="id" value="<?=$trip['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
