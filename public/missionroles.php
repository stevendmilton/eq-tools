<?php
try {
    include_once __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $roles = allRoles($pdo);
    
    $title = 'Ward Mission Roles';
    
    $totalRoles = countRecords($pdo,'ward_mission');
    
    ob_start();
    
    include  __DIR__ . '/../templates/missionroles.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
