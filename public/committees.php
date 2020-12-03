<?php
try {
    include_once __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $committees = allCommittees($pdo);
    
    $title = 'Quorum Committee List';
    
    $totalCommittees = countRecords($pdo,'committees');
    
    ob_start();
    
    include  __DIR__ . '/../templates/committees.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
