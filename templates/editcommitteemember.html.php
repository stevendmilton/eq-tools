<html>

<head>
    <title>Edit Committee Member</title>
    <link rel="stylesheet" href="/css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="/public/updatecommitteemember.php" method="get">
        <fieldset class="fullset">
            <legend>Edit Committee Member</legend>
            <label style="padding-bottom:1em;"><?=$cmember['first_name'] . ' ' . $cmember['last_name']?></label>
            <label for="leader">Committee&nbsp;Leader?</label>
            <input type="checkbox" name="leader" id="leader" value=1 <?php if ($cmember['leader']!=0){echo " checked";}?>>
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <input type="hidden" name="name" value="<?=$cmember['name'];?>">
            <input type="submit" name="submit" value="Edit Committee Member">
        </fieldset>
    </form>
</body>

</html>
