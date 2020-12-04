<html>

<head>
    <title>Add Team</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/addteam.php" method="get">
        <fieldset>
            <legend>New Team</legend>
            <label for="teamname">Team name:</label>
            <input type="text" name="teamname" id="teamname">
            <input type="submit" name="submit" value="Add Team">
        </fieldset>
    </form>
</body>

</html>
