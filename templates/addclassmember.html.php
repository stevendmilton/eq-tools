<html>

<head>
    <title>Enter Class Member</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="addclassmember.php" method="get">
        <fieldset>
            <legend>New Class Member</legend>
            <label for="firstname">First name:</label>
            <input type="text" name="firstname" id="firstname">
            <label for="lastname">Last name:</label>
            <input type="text" name="lastname" id="lastname">
            <input type="hidden" name="class" id='class' value="<?=$_GET['class'];?>">
            <input type="submit" name="submit" value="Add Member">
        </fieldset>
    </form>
</body>

</html>
