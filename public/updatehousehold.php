<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $curdate = date("Y-m-d");
    $sname = str_replace('%20',' ',$_GET['surname']);
    $fields = ['id' => $_GET['id'], 'surname' => $sname, 'district' => $_GET['districtid'],'single_sister' => $_GET['single_sister'],'priesthood' => $_GET['priesthood'],'part_member' => $_GET['part_member'],'companionship_id' => $_GET['companionid'],'date_added' => $curdate];
    $output = updateData($pdo, $fields, 'households');
    $title = 'Household updated';
    header('location: households.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';

    $output = 'Database error: ' . $e->getMessage() . ' in ' 
    . $e->getFile() . ':' . $e->getLine();
}

include  __DIR__ . '/../templates/layout.html.php';
?>
