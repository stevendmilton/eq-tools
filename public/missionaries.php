<?php
try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $missionarys = allMissionaries($pdo);
    
    $title = 'Missionary list';
    
    $totalMissionaries = countRecords($pdo,'missionaries');
    
    ob_start();
    
    include  __DIR__ . '/../templates/missionaries.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
