<?php
    $pdo = new PDO('mysql:host=localhost;dbname=eq_tools;
    charset=utf8', 'equser', 'Alma3738');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
