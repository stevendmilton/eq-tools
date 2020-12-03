<html>

<head>
    <title>Edit Missionary</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="updatemissionary.php" method="get">
        <fieldset class="fullset">
            <legend>Edit Missionary</legend>
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" value="<?=$missionary['first_name'];?>">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" value="<?=$missionary['last_name'];?>">
            <label for="fulltime">Fulltime?</label>
            <input type="checkbox" name="fulltime" id="fulltime" value=1 <?php if ($missionary['fulltime']!=0){echo " checked";}?>>
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <input type="submit" name="submit" value="Edit Missionary">
        </fieldset>
    </form>
</body>

</html>
