<html>

<head>
    <title>Edit Household</title>
    <link rel="stylesheet" href="../css/form.css" />
    <meta charset="utf-8">
</head>

<body>
    <form action="updatehousehold.php" method="get">
        <fieldset class="fullset">
            <legend>Edit Household</legend>
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" value="<?=$household['surname'];?>">
            <?php districtDropdown($household['district']);?>
            <label for="single_sister">Single&nbsp;Sister?</label>
            <input type="checkbox" name="single_sister" id="single_sister" value=1 <?php if ($household['single_sister']!=0){echo " checked";}?>>
            <label for="priesthood">Priesthood in the Home?</label>
            <input type="checkbox" name="priesthood" id="priesthood" value=1 <?php if ($household['priesthood']!=0){echo " checked";}?>>
            <label for="part_member">Part&nbsp;Member?</label>
            <input type="checkbox" name="part_member" id="part_member" value=1 <?php if ($household['part_member']!=0){echo " checked";}?>>
            <?php companionDropdown($household['companionship_id'])?>
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <input type="submit" name="submit" value="Edit Household">
        </fieldset>
    </form>
</body>

</html>
