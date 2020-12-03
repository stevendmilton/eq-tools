<?php 
if (isset($_GET['id'])) {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $tmember = getTeamMember($pdo,$_GET['id']);
    
    ob_start();
    
    include  __DIR__ . '/../templates/editteammember.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit Team Member ';

include  __DIR__ . '/../templates/layout.html.php';
?>
