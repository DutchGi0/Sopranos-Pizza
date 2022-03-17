<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/connection.php';

$created = new DateTime();
$created = $created->format('Y-m-d H:i:s');

$data = [
    ':name' => $_POST['name'],
    ':description' => $_POST['description'],
    ':datetime' => $created,
];

$query =
    'INSERT INTO pizza (name, description, price, img, size) VALUES (:name, :description, :price, :img, :size)';

$stmt = $db->prepare($query);

$stmt->execute($data);

header('location: ..\index.php?page=stroopwafel');
