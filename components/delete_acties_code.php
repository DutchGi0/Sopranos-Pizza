<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/connection.php';

$name = $_REQUEST['name'];

try {
    $sql = "DELETE FROM acties WHERE name='$name'";
    $db->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($pdo);
header('location: ..\index.php?page=stroopwafel');
