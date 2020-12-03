<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $curdate = date("Y-m-d");
    $fields = ['id' => $_GET['id'], 'leader' => $_GET['leader']];
    $output = updateData($pdo, $fields, 'committee');
    $title = 'Committee Member updated';
    header('location: committeemembers.php?committee='.$_GET['name']);
} catch (PDOException $e) {
$title = 'An error has occurred';

$output = 'Database error: ' . $e->getMessage() . ' in '
. $e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';
?>
