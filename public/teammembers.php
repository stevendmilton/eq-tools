<?php
try {
    include_once __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $tname = str_replace('%20',' ',$_GET['team']);
    $totalTeamMembers = countTeamMembers($pdo,$tname);
    $title = $tname . ' Team List';
    $elders = allTeamMembers($pdo,$tname);
    
    ob_start();
    
    include  __DIR__ . '/../templates/teammembers.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
$title = 'An error has occurred';

$output = 'Database error: ' . $e->getMessage() . ' in '
. $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../templates/layout.html.php';
?>
