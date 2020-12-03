<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['lastname'])) {
    try {
        $curdate = date("Y-m-d");
        $fname = str_replace('%20',' ',$_GET['firstname']);
        $lname = str_replace('%20',' ',$_GET['lastname']);
        $fields = ['first_name' => $fname,'last_name' => $lname,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'consultants');
        $title = 'Consultant added';
        header('location: consultants.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addconsultant.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new consultant';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
