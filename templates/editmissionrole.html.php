<html>

<head>
    <title>Edit Mission Role</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/updatemissionrole.php" method="get">
        <fieldset>
            <legend>Edit Role</legend>
            <label for="role">Mission Role:</label>
            <input type="text" name="role" id="role" value="<?=$role['role'];?>">
            <label for="role">Mission Role:</label>
            <input type="text" name="member" id="member" value="<?=$role['member'];?>">
            <label for="role">Date Called:</label>
            <input type="date" name="called" id="called" value="<?=$role['date_called'];?>">
            <input type="hidden" name="id" value="<?=$role['id'];?>">
            <input type="submit" name="submit" value="Edit Role">
        </fieldset>
    </form>
</body>

</html>
