<p>
    <?=$totalClasses?> temple prep class(es) have been entered.
    <a href="addclass.php">Add Class</a>
</p>

<table>
    <tr>
        <th>Class&nbsp;Date</th>
        <th>Show&nbsp;In&nbsp;Menu</th>
        <th>Date&nbsp;Added</th>
        <th>Last&nbsp;Updated</th>
    </tr>
    <?php foreach($classes as $class): ?>
    <tr>
        <td><?=$class['class_date']?></td>
        <td>
            <?php if($class['showmenu']) {echo "            Y";} else {echo "N";};?>
        </td>
        <td>
            <?=$class['date_added'];?>
        </td>
        <td>
            <?=$class['date_updated'];?>
        </td>
        <td>
            <form action="editclass.php" method="get">
                <input type="hidden" name="id" value="<?=$class['id']?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="deleteclass.php" method="post">
                <input type="hidden" name="id" value="<?=$class['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
