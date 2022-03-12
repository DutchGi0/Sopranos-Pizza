<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/connection.php';

if (isset($_POST['anoniem'])) {
    $_POST['name'] = 'Anoniem';
}

$created = new DateTime();
$created = $created->format('Y-m-d H:i:s');

$data = [
    ':name' => $_POST['name'],
    ':email' => $_POST['email'],
    ':comment' => $_POST['comment'],
    ':datetime' => $created,
];

$query =
    'INSERT INTO reviews (name, email, comment, datetime) VALUES (:name, :email, :comment, :datetime)';

$stmt = $db->prepare($query);

$stmt->execute($data);

header('location: ..\index.php?page=reviews');
