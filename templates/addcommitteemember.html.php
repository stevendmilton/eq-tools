<html>

<head>
    <title>Add Committee Member</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/addcommitteemember.php" method="get">
        <fieldset>
            <legend>New Committee Member</legend>
            <label for="committeename">Committee name:</label>
            <input type="text" disabled name="committeename" id="committeename" value=<?=$_GET['committee']?>>
            <?php committeeMemberDropdown($_GET['committee']) ?>
            <label for="leader">Committee Leader?</label>
            <input type="checkbox" name="leader" id="leader">
            <input type="hidden" name="committee" value=<?=$_GET['committee']?>>
            <input type="submit" name="submit" value="Add Member">
        </fieldset>
    </form>
</body>

</html>
