<?php
session_start();
require_once 'header.php';
require_once 'connection.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'homepage';
}
if ($page) {
    include 'page/' . $page . '.php';
}
require_once 'footer.php';
?>
