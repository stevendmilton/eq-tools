<?php
if (isset($_GET['id'])) {
    try {
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/../includes/DatabaseFunctions.php';
    
        deleteData($pdo, $_GET['id'],'temple_prep');
        $title = 'Class member deleted';
        header('location: templeclass.php?class='.$_GET['class']);
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
}
include  __DIR__ . '/../templates/layout.html.php';
?>
