<html>

<head>
    <title>Edit Companionship</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="updatecompanionship.php" method="get">
        <fieldset>
            <legend>Edit Companionship</legend>
            <?php districtDropdown($_GET['districtid']); ?>
            <?php eldersDropdown($_GET['companion1'],'Companion 1','1'); ?>
            <?php eldersDropdown($_GET['companion2'],'Companion 2','2'); ?>
            <label for="interview">Interviewed?</label>
            <input type="checkbox" name="interview" id="interview" value=1>
            <input type="hidden" name="companionid" value="<?php echo $_GET['id'];?>">
            <input type="submit" name="submit" value="Edit District">
        </fieldset>
    </form>
</body>

</html>
