<?php
if (isset($_POST['id'])) {
    try {
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/../includes/DatabaseFunctions.php';
    
        deleteData($pdo, $_POST['id'],'consultants');
        $title = 'Consultant deleted';
        header('location: consultants.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
}
include  __DIR__ . '/../templates/layout.html.php';
?>
