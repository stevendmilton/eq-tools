<html>

<head>
    <title>Enter Temple Trip Member</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/addtripmember.php" method="get">
        <fieldset>
            <legend>New Temple Trip Member</legend>
            <label for="firstname">First name:</label>
            <input type="text" name="firstname" id="firstname">
            <label for="lastname">Last name:</label>
            <input type="text" name="lastname" id="lastname">
            <input type="hidden" name="trip" id='trip' value="<?=$_GET['trip'];?>">
            <input type="submit" name="submit" value="Add Member">
        </fieldset>
    </form>
</body>

</html>
