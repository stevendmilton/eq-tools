<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['lastname'])) {
    try {
        $curdate = date("Y-m-d");
        $fname = str_replace('%20',' ',$_GET['firstname']);
        $lname = str_replace('%20',' ',$_GET['lastname']);
        $fields = ['first_name' => $fname,'last_name' => $lname,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'mission_prep');
        $title = 'Mission Prep Student added';
        header('location: missionprep.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addmissionprep.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new mission prep student';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
