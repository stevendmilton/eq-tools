<?php
try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $companions = allCompanions($pdo);
    
    $title = 'Companionship List';
    
    $totalCompanions = countRecords($pdo,'companionships');
    
    ob_start();
    
    include  __DIR__ . '/../templates/companions.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
