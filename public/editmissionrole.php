<?php 
if (isset($_GET['id'])) {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $role = getMissionRole($pdo,$_GET['id']);
    
    ob_start();
    
    include  __DIR__ . '/../templates/editmissionrole.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit Mission Role ';

include  __DIR__ . '/../templates/layout.html.php';
?>
