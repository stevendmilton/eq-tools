<html>

<head>
    <title>Edit Temple Trip</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="updatetrip.php" method="get">
        <fieldset>
            <legend>Edit Temple Trip</legend>
            <label for="trip_date">Trip&nbsp;Date:</label>
            <input type="date" name="trip_date" id="trip_date" value="<?=$trip['trip_date'];?>">
            <label for="leader">Show&nbsp;in&nbsp;Menu?</label>
            <input type="checkbox" name="showmenu" id="showmenu" value=1 <?php if ($trip['showmenu']!=0){echo " checked";}?>>
            <input type="hidden" name="id" value="<?=$trip['id'];?>">
            <input type="submit" name="submit" value="Edit Trip">
        </fieldset>
    </form>
</body>

</html>
