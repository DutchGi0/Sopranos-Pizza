<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/connection.php';

$name = $_REQUEST['name'];
$description = $_REQUEST['description'];

try {
    $sql = 'UPDATE acties SET description=:description WHERE name=:name';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->execute();
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($pdo);
header('location: ..\index.php?page=stroopwafel');
