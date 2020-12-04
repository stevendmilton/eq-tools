<html>

<head>
    <title>Edit Temple Prep Class</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/updateclass.php" method="get">
        <fieldset>
            <legend>Edit Temple Prep Class</legend>
            <label for="class_date">Class&nbsp;Date:</label>
            <input type="date" name="class_date" id="class_date" value="<?=$class['class_date'];?>">
            <label for="leader">Show&nbsp;in&nbsp;Menu?</label>
            <input type="checkbox" name="showmenu" id="showmenu" value=1 <?php if ($class['showmenu']!=0){echo " checked";}?>>
            <input type="hidden" name="id" value="<?=$class['id'];?>">
            <input type="submit" name="submit" value="Edit Class">
        </fieldset>
    </form>
</body>

</html>
