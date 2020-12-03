<html>

<head>
    <title>Enter District Info</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="adddistrict.php" method="get">
        <fieldset>
            <legend>New District</legend>
            <label for="dname">District name:</label>
            <input type="text" name="districtname" id="dname">
            <?php eldersDropdown(0,'District Leader','1') ?>
            <input type="submit" name="submit" value="Add District">
        </fieldset>
    </form>
</body>

</html>
