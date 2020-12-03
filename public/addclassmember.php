<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['lastname'])) {
    try {
        $curdate = date("Y-m-d");
        $fname = str_replace('%20',' ',$_GET['firstname']);
        $lname = str_replace('%20',' ',$_GET['lastname']);
        $fields = ['class_id' => $_GET['class'],'first_name' => $fname,'last_name' => $lname,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'temple_prep');
        $title = 'Class Member added';
        header('location: templeclass.php?class='.$_GET['class']);
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addclassmember.html.php';
    
    $output = ob_get_clean();
    $title = 'Add Class Member';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
