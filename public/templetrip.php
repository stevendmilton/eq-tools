<?php
try {
    include_once __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $members = allTripMembers($pdo,$_GET['trip']);
    
    $title = 'Temple Prep Trip Members';
    
    $totalMembers = countTripMembers($pdo,$_GET['trip']);
    
    ob_start();
    
    include  __DIR__ . '/../templates/templetrip.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
