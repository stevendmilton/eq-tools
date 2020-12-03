<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['elderid1'])) {
    try {
        $curdate = date("Y-m-d");
        $committeeid = getCommittee($pdo,$_GET['committee']);
        if(isset($_GET['leader'])){$lead = 1;}else{$lead = 0;};
        $fields = ['committee' => $committeeid,'member' => $_GET['elderid1'],'leader' => $lead,'date_added' => $curdate];
        $output = insertData($pdo, $fields, 'committee');
        $title = $_GET['committee'] . ' committee member added';
        header('location: committeemembers.php?committee='.$_GET['committee']);
} catch (PDOException $e) {
$title = 'An error has occurred';

$output = 'Database error: ' . $e->getMessage() . ' in '
. $e->getFile() . ':' . $e->getLine();
}} else {
ob_start();

include __DIR__ . '/../templates/addcommitteemember.html.php';

$output = ob_get_clean();
$title = 'Add a new committee member';
}

include __DIR__ . '/../templates/layout.html.php';
?>
