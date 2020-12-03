<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['class_date'])) {
    try {
        $curdate = date("Y-m-d");
        $fields = ['class_date' => $_GET['class_date'],'showmenu' => $_GET['showmenu'],'date_updated' => $curdate,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'temple_class');
        $title = $_GET['class_date'] . ' class added';
        header('location: templeclasses.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addclass.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new class';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
