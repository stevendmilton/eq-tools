<html>

<head>
    <title>Enter Household Information</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="addhousehold.php" method="get">
        <fieldset id="householdfield">
            <legend>New Household</legend>
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname">
            <?php districtDropdown(0);?>
            <label for="single_sister">Single&nbsp;Sister?</label>
            <input type="checkbox" name="single_sister" id="single_sister" value=1>
            <label for="priesthood">Priesthood?</label>
            <input type="checkbox" name="priesthood" id="priesthood" value=1>
            <label for="part_member">Part&nbsp;Member?</label>
            <input type="checkbox" name="part_member" id="part_member" value=1>
            <input type="submit" name="submit" value="Add Household">
        </fieldset>
    </form>
</body>

</html>
