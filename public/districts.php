<?php
try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $districts = allDistricts($pdo);
    
    $title = 'Ministering Districts List';
    
    $totalDistricts = countRecords($pdo,'districts');
    
    ob_start();
    
    include  __DIR__ . '/../templates/districts.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
