<?php 
if (isset($_GET['id'])) {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $household = getHousehold($pdo,$_GET['id']);
    
    ob_start();
    
    include  __DIR__ . '/../templates/edithousehold.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit Household ';

include  __DIR__ . '/../templates/layout.html.php';
?>
