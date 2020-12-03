<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['trip_date'])) {
    try {
        $curdate = date("Y-m-d");
        $fields = ['trip_date' => $_GET['trip_date'],'showmenu' => $_GET['showmenu'],'date_updated' => $curdate,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'temple_trip');
        $title = $_GET['trip_date'] . ' trip added';
        header('location: templetrips.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addtrip.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new trip';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
