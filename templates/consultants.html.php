<p>
    <?=$totalConsultants?> consultant(s) have been entered.
    <a href="addconsultant.php">Add Temple/Family History Consultant</a>
</p>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date&nbsp;Added</th>
    </tr>
    <?php foreach($consultants as $consultant): ?>
    <tr>
        <td>
            <?=htmlspecialchars($consultant['first_name'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=htmlspecialchars($consultant['last_name'], ENT_QUOTES, 'UTF-8');?>
        </td>
        <td>
            <?=$consultant['date_added'];?>
        </td>
        <td>
            <form action="deleteconsultant.php" method="post">
                <input type="hidden" name="id" value="<?=$consultant['id']?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
