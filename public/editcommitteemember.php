<?php 
if (isset($_GET['id'])) {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $cmember = getCommitteeMember($pdo,$_GET['id']);
    
    ob_start();
    
    include  __DIR__ . '/../templates/editcommitteemember.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit Committee Member ';

include  __DIR__ . '/../templates/layout.html.php';
?>
