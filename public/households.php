<?php
try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $households = allHouseholds($pdo);
    
    $title = 'Household list';
    
    $totalHouseholds = countRecords($pdo,'households');
    
    ob_start();
    
    include  __DIR__ . '/../templates/households.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
