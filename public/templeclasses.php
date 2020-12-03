<?php
try {
    include_once __DIR__ . '/../includes/DatabaseFunctions.php';
    
    $classes = allClasses($pdo);
    
    $title = 'Temple Prep Classes';
    
    $totalClasses = countActiveClasses($pdo);
    
    ob_start();
    
    include  __DIR__ . '/../templates/templeclasses.html.php';
    
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
}
include  __DIR__ . '/../templates/layout.html.php';
?>
