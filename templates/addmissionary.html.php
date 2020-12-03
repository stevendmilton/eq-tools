<html>

<head>
    <title>Enter Missionary Information</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="addmissionary.php" method="get">
        <fieldset>
            <legend>New Missionary</legend>
            <label for="firstname">First name:</label>
            <input type="text" name="firstname" id="firstname">
            <label for="lastname">Last name:</label>
            <input type="text" name="lastname" id="lastname">
            <label for="fulltime">Fulltime?</label>
            <input type="checkbox" name="fulltime" id="fulltime" value=1>
            <input type="submit" name="submit" value="Add Missionary">
        </fieldset>
    </form>
</body>

</html>
