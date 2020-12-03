<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';
    $curdate = date("Y-m-d");
    if (isset($_GET['interview'])) {
        $fields = ['id' => $_GET['companionid'], 'district' => $_GET['districtid'], 'companion1' => $_GET['elderid1'],'companion2' => $_GET['elderid2'],'date_updated' => $curdate,'last_interview' => $curdate];
    } else {
        $fields = ['id' => $_GET['companionid'], 'district' => $_GET['districtid'], 'companion1' => $_GET['elderid1'],'companion2' => $_GET['elderid2'],'date_updated' => $curdate];
    }
    $output = updateData($pdo, $fields, 'companionships');
    if(isset($_GET['interview'])) {
        $fields = ['companion_id' => $_GET['companionid'], 'interview_date' => $curdate];
        $output = insertData($pdo, $fields, 'interviews');
    }
    $title = 'Companionship updated ';
    header('location: companions.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';

    $output = 'Database error: ' . $e->getMessage() . ' in ' 
    . $e->getFile() . ':' . $e->getLine();
}

include  __DIR__ . '/../templates/layout.html.php';
?>
