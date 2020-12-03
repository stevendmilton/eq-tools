<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $curdate = date("Y-m-d");
    $dname = str_replace('%20',' ',$_GET['districtname']);
    $fields = ['id' => $_GET['districtid'], 'district' => $dname, 'leader' => $_GET['elderid1'],'date_updated' => $curdate];

    $output = updateData($pdo,$fields,'districts');
    $title = 'District ' . $dname . ' updated';
    header('location: districts.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';

    $output = 'Database error: ' . $e->getMessage() . ' in ' 
    . $e->getFile() . ':' . $e->getLine();
}

include  __DIR__ . '/../templates/layout.html.php';
?>
