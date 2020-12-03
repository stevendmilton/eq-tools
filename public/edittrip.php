<?php 
if (isset($_GET['id'])) {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $trip = getTrip($pdo,$_GET['id']);
    
    ob_start();
    
    include  __DIR__ . '/../templates/edittrip.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit Temple Trip';

include  __DIR__ . '/../templates/layout.html.php';
?>
