<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['member'])) {
    try {
        $curdate = date("Y-m-d");
        $mname = str_replace('%20',' ',$_GET['member']);
        $fields = ['member' => $mname,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'bom_class');
        $title = $mname . ' added';
        header('location: bomclass.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addbommember.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new class member';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
