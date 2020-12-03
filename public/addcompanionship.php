<?php
include __DIR__ . '/../includes/DatabaseConnection.php';
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['elderid1'])) {
    try {
        $curdate = date("Y-m-d");
        $fields = ['district' => $_GET['districtid'],'companion1' => $_GET['elderid1'],'companion2' => $_GET['elderid2'],'date_added' => $curdate,'date_updated' => $curdate];
        $output = insertData($pdo, $fields, 'companionships');
        $title = 'Companion added';
        header('location: companions.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addcompanionship.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a New Companionship';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
