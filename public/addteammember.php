<?php
include __DIR__ . '/../includes/DatabaseFunctions.php';
if (isset($_GET['elderid1'])) {
    try {
        $curdate = date("Y-m-d");
        $tname = str_replace('%20','&nbsp; ',$_GET['team']);
        $teamid = getTeam($pdo,$tname);
        if(isset($_GET['leader'])){$lead = 1;}else{$lead = 0;};
        $fields = ['teamid' => $teamid,'memberid' => $_GET['elderid1'],'leader' => $lead,'date_added' => $curdate,'date_updated' => $curdate];
        $output = insertData($pdo, $fields, 'maint_members');
        $title = $tname . ' team member added';
        header('location: teammembers.php?team='.$tname);
} catch (PDOException $e) {
$title = 'An error has occurred';

$output = 'Database error: ' . $e->getMessage() . ' in '
. $e->getFile() . ':' . $e->getLine();
}} else {
ob_start();

include __DIR__ . '/../templates/addteammember.html.php';

$output = ob_get_clean();
$title = 'Add a new team member';
}

include __DIR__ . '/../templates/layout.html.php';
?>
