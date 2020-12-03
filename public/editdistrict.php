<?php 
if (isset($_GET['district'])) {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $diname = str_replace('%20',' ',$_GET['district']);
    $leader = getLeader($pdo,$_GET['leader']);
    $dname = getDistrict($pdo,$diname);
    ob_start();
    
    include  __DIR__ . '/../templates/editdistrict.html.php';
    
    $output = ob_get_clean();
}
$title = 'Edit District ';

include  __DIR__ . '/../templates/layout.html.php';
?>
