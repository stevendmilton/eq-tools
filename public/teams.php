<?php
try {
    include_once __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $teams = allTeams($pdo);
    
    $title = 'Maintenance Team List';
    
    $totalTeams = countRecords($pdo,'maint_team');
    
    ob_start();
    
    include  __DIR__ . '/../templates/teams.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
