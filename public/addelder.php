<?php
if (isset($_GET['lastname'])) {
    try {
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/../includes/DatabaseFunctions.php';
        $curdate = date("Y-m-d");
        $fname = str_replace('%20',' ',$_GET['firstname']);
        $lname = str_replace('%20',' ',$_GET['lastname']);
        $fields = ['first_name' => $fname,'last_name' => $lname,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'elders');
        $title = 'Quorum member added';
        header('location: elders.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addelder.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new quorum member';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
