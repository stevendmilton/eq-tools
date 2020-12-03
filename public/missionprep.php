<?php
try {
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $students = allMissionPrep($pdo);
    
    $title = 'Missionary Prep Class';
    
    $totalStudents = countRecords($pdo,'mission_prep');
    
    ob_start();
    
    include  __DIR__ . '/../templates/missionprep.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
