<?php 
if (isset($_GET['id'])) {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    ob_start();
    
    include  __DIR__ . '/../templates/editcompanionship.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit District ';

include __DIR__ . '/../templates/layout.html.php';?>
