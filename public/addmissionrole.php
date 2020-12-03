<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['role'])) {
    try {
        $curdate = date("Y-m-d");
        $rname = str_replace('%20',' ',$_GET['role']);
        $mname = str_replace('%20',' ',$_GET['member']);
        $fields = ['role' => $rname,'member' => $mname,'date_called' => $_GET['calling']];
        $output = insertData($pdo, $fields, 'ward_mission');
        $title = $rname . ' role added';
        header('location: missionroles.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' 
        . $e->getFile() . ':' . $e->getLine();
    }
} else {
    ob_start();
    
    include  __DIR__ . '/../templates/addmissionrole.html.php';
    
    $output = ob_get_clean();
    $title = 'Add a new role';
}

include  __DIR__ . '/../templates/layout.html.php';
?>
