<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['lastname'])) {
    try {
        $curdate = date("Y-m-d");
        $fname = str_replace('%20',' ',$_GET['firstname']);
        $lname = str_replace('%20',' ',$_GET['lastname']);
        $fields = ['first_name' => $fname,'last_name' => $lname,'fulltime' => $_GET['fulltime'],'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'missionaries');
        $title = 'Missionary added';
        header('location: missionaries.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addmissionary.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new missionary';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
