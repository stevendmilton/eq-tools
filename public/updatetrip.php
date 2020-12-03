<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $curdate = date("Y-m-d");
    if(!isset($_GET['showmenu'])){$show = 0;} else {$show = 1;};
    $fields = ['id' => $_GET['id'], 'trip_date' => $_GET['trip_date'], 'showmenu' => $show,'date_updated' => $curdate];

    $output = updateData($pdo,$fields,'temple_trip');
    $title = 'Trip updated';
    header('location: templetrips.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';

    $output = 'Database error: ' . $e->getMessage() . ' in ' 
    . $e->getFile() . ':' . $e->getLine();
}

include  __DIR__ . '/../templates/layout.html.php';
?>
