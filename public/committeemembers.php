<?php
try {
    include_once __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $cname = str_replace('%20',' ',$_GET['committee']);
    $totalCommitteeMembers = countMembers($pdo,$cname);
    $title = $cname . ' Committee List';
    $elders = allCommitteeMembers($pdo,$cname);
    
    ob_start();
    
    include  __DIR__ . '/../templates/committeemembers.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
$title = 'An error has occurred';

$output = 'Database error: ' . $e->getMessage() . ' in '
. $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../templates/layout.html.php';
?>
