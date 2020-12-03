<?php
try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $elders = allElders($pdo);
    
    $title = 'Elders list';
    
    $totalElders = countRecords($pdo,'elders');
    
    ob_start();
    
    include  __DIR__ . '/../templates/elders.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
