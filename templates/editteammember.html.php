<html>

<head>
    <title>Edit Team Member</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="updateteammember.php" method="get">
        <fieldset class="fullset">
            <legend>Edit Team Member</legend>
            <label style="padding-bottom:1em;"><?=$tmember['first_name'] . ' ' . $tmember['last_name']?></label>
            <label for="leader">Team&nbsp;Leader?</label>
            <input type="checkbox" name="leader" id="leader" value=1 <?php if ($tmember['leader']!=0){echo " checked";}?>>
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <input type="hidden" name="name" value="<?=$tmember['name'];?>">
            <input type="submit" name="submit" value="Edit Team Member">
        </fieldset>
    </form>
</body>

</html>
