<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $curdate = date("Y-m-d");
    $fname = str_replace('%20',' ',$_GET['firstname']);
    $lname = str_replace('%20',' ',$_GET['lastname']);
    $fields = ['id' => $_GET['id'], 'first_name' => $fname, 'last_name' => $lname,'fulltime' => $_GET['fulltime'],'date_added' => $curdate];
    $output = updateData($pdo, $fields, 'missionaries');
    $title = 'Missionary updated';
    header('location: missionaries.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';

    $output = 'Database error: ' . $e->getMessage() . ' in ' 
    . $e->getFile() . ':' . $e->getLine();
}

include  __DIR__ . '/../templates/layout.html.php';
?>
