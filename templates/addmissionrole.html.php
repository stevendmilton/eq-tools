<html>

<head>
    <title>Add Ward Mission Role</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/addmissionrole.php" method="get">
        <fieldset>
            <legend>Ward Mission Role</legend>
            <label for="role">Ward Mission Role:</label>
            <input type="text" name="role" id="role">
            <label for="member">Member Name:</label>
            <input type="text" name="member" id="member">
            <label for="callingdate">Calling Date:</label>
            <input type="date" name="calling" id="calling">
            <input type="submit" name="submit" value="Add Role">
        </fieldset>
    </form>
</body>

</html>
