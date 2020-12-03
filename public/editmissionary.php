<?php 
if (isset($_GET['id'])) {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $missionary = getMissionary($pdo,$_GET['id']);
    
    ob_start();
    
    include  __DIR__ . '/../templates/editmissionary.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit Missionary ';

include  __DIR__ . '/../templates/layout.html.php';
?>
