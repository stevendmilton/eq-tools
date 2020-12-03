<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['districtname'])) {
    try {
        $curdate = date("Y-m-d");
        $dname = str_replace('%20',' ',$_GET['districtname']);
        $fields = ['district' => $dname,'leader' => $_GET['elderid1'],'date_added' => $curdate,'date_updated' => $curdate];
        $output = insertData($pdo, $fields, 'districts');
        $title = $dname . ' District added';
        header('location: districts.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/adddistrict.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new district';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
