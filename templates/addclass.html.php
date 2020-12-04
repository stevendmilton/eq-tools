<html>

<head>
    <title>Enter Class Information</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/addclass.php" method="get">
        <fieldset>
            <legend>Temple Preparation Class</legend>
            <label for="class_date">Class Date:</label>
            <input type="date" name="class_date" id="class_date">
            <label for="showmenu">Show in Menu?</label>
            <input type="checkbox" name="showmenu" id="showmenu" value=1>
            <input type="submit" name="submit" value="Add Class">
        </fieldset>
    </form>
</body>

</html>
