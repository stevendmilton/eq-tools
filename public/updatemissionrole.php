<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $curdate = date("Y-m-d");
    $mrole = str_replace('%20',' ',$_GET['role']);
    $member = str_replace('%20',' ',$_GET['member']);
    $fields = ['id' => $_GET['id'], 'role' => $mrole, 'member' => $member, 'date_called' => $_GET['called']];
    $output = updateData($pdo, $fields, 'ward_mission');
    $title = 'Role updated';
    header('location: missionroles.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';

    $output = 'Database error: ' . $e->getMessage() . ' in ' 
    . $e->getFile() . ':' . $e->getLine();
}

include  __DIR__ . '/../templates/layout.html.php';
?>
