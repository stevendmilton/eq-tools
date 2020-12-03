<html>

<head>
    <title>Edit District</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="updatedistrict.php" method="get">
        <fieldset>
            <legend>Edit District</legend>
            <label for="districtname">District Name:</label>
            <input type="text" name="districtname" id="districtname" value="<?php echo $dname;?>">
            <?php eldersDropdown($_GET['leader'],'District Leader','1'); ?>
            <input type="hidden" name="districtid" value="<?php echo $_GET['district'];?>">
            <input type="submit" name="submit" value="Edit District">
        </fieldset>
    </form>
</body>

</html>
