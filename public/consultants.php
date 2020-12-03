<?php
try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $consultants = allConsultants($pdo);
    
    $title = 'Temple/Family History Consultant';
    
    $totalConsultants = countRecords($pdo,'consultants');
    
    ob_start();
    
    include  __DIR__ . '/../templates/consultants.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
