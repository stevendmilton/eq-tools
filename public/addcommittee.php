<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['committeename'])) {
    try {
        $curdate = date("Y-m-d");
        $cname = str_replace('%20',' ',$_GET['committeename']);
        $fields = ['name' => $cname,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'committees');
        $title = $cname . ' committee added';
        header('location: committees.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addcommittee.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new committee';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
