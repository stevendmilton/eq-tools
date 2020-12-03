<?php
if (isset($_GET['id'])) {
    try {
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/../includes/DatabaseFunctions.php';
    
        deleteData($pdo, $_GET['id'],'committee');
        $title = 'Committee member deleted';
        header('location: committeemembers.php?committee='.$_GET['name']);
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
}
include  __DIR__ . '/../templates/layout.html.php';
?>
