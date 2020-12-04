<html>

<head>
    <title>Add Team Member</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/addteammember.php" method="get">
        <fieldset>
            <legend>New Team Member</legend>
            <label for="teamname">Team name:</label>
            <input type="text" disabled name="teamname" id="teamname" value=<?=$_GET['team']?>>
            <?php teamMemberDropdown($_GET['team']) ?>
            <label for="leader">Team Leader?</label>
            <input type="checkbox" name="leader" id="leader">
            <input type="hidden" name="team" value="<?=urldecode($_GET['team'])?>">
            <input type="submit" name="submit" value="Add Member">
        </fieldset>
    </form>
</body>

</html>
