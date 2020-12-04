<html>

<head>
    <title>Enter Temple Trip Information</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/addtrip.php" method="get">
        <fieldset>
            <legend>Temple Trip</legend>
            <label for="trip_date">Class Date:</label>
            <input type="date" name="trip_date" id="trip_date">
            <label for="showmenu">Show in Menu?</label>
            <input type="checkbox" name="showmenu" id="showmenu" value=1>
            <input type="submit" name="submit" value="Add Trip">
        </fieldset>
    </form>
</body>

</html>
