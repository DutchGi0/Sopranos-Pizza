<?php

$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'sopranos_pizza';

try {
    $db = new PDO(
        "mysql:host={$db_host};dbname={$db_name}",
        $db_username,
        $db_pass
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
