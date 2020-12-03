<html>

<head>
    <title>Enter Companionship Info</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="addcompanionship.php" method="get">
        <fieldset>
            <legend>New Companionship</legend>
            <?php districtDropdown(0) ?>
            <?php eldersDropdown(0,'Quorum Member','1') ?>
            <?php eldersDropdown(0,'Quorum Member','2') ?>
            <input type="submit" name="submit" value="Add Companionship">
        </fieldset>
    </form>
</body>

</html>
