<html>

<head>
    <title>Enter Elder's name</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="addelder.php" method="get">
        <fieldset>
            <legend>New Quorum Member</legend>
            <label for="firstname">First name:</label>
            <input type="text" name="firstname" id="firstname">
            <label for="lastname">Last name:</label>
            <input type="text" name="lastname" id="lastname">
            <input type="submit" name="submit" value="Add Quorum Member">
        </fieldset>
    </form>
</body>

</html>
