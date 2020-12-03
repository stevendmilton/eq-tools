<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['surname'])) {
    try {
        $curdate = date("Y-m-d");
        $sname = str_replace('%20',' ',$_GET['surname']);
        $fields = ['surname' => $sname,'district' => $_GET['districtid'],'single_sister' => $_GET['single_sister'],'priesthood' => $_GET['priesthood'],'part_member' => $_GET['part_member'],'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'households');
        $title = 'Household added';
        header('location: households.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addhousehold.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new household';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
