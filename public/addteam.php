<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['teamname'])) {
    try {
        $curdate = date("Y-m-d");
        $tname = str_replace('%20',' ',$_GET['teamname']);
        $fields = ['name' => $tname,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'maint_team');
        $title = $tname . ' team added';
        header('location: teams.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addteam.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new team';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
