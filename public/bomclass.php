<?php
try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $members = allBOMMembers($pdo);
    
    $title = 'Book Of Mormon Class';
    
    $totalMembers = countRecords($pdo,'bom_class');
    
    ob_start();
    
    include  __DIR__ . '/../templates/bomclass.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
