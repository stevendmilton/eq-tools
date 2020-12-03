<?php 
if (isset($_GET['id'])) {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $class = getClass($pdo,$_GET['id']);
    
    ob_start();
    
    include  __DIR__ . '/../templates/editclass.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit Temple Prep Class ';

include  __DIR__ . '/../templates/layout.html.php';
?>
