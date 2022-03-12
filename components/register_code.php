<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/connection.php';

if (isset($_SESSION['user'])) {
    header('location: welcome.php');
}

if (isset($_REQUEST['register_btn'])) {
    $name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var(strtolower($_REQUEST['email']), FILTER_SANITIZE_EMAIL);
    $password = strip_tags($_REQUEST['password']);
    $straat = filter_var($_REQUEST['straat'], FILTER_SANITIZE_STRING);
    $stad = filter_var($_REQUEST['stad'], FILTER_SANITIZE_STRING);
    $postcode = filter_var($_REQUEST['postcode'], FILTER_SANITIZE_STRING);
    $telefoon = filter_var($_REQUEST['telefoon'], FILTER_SANITIZE_NUMBER_INT);

    if (empty($name)) {
        $errorMsg[0][] = 'Voer je naam in';
    }
    if (empty($email)) {
        $errorMsg[1][] = 'Voer je e-mailadres in';
    }
    if (empty($password)) {
        $errorMsg[2][] = 'Voer je wachtwoord in';
    }
    if (strlen($password) < 6) {
        $errorMsg[2][] = 'Je wachtwoord moet minstend 6 tekens lang zijn';
    }
    if (empty($straat)) {
        $errorMsg[3][] = 'Voer je straat in';
    }
    if (empty($stad)) {
        $errorMsg[4][] = 'Voer je stad in';
    }
    if (empty($postcode)) {
        $errorMsg[5][] = 'Voer je postcode in';
    }
    if (strlen($postcode) < 6 or strlen($postcode) > 7) {
        $errorMsg[5][] = 'De postcode moet minstends 6 tekens lang zijn';
    }
    if (empty($telefoon)) {
        $errorMsg[6][] = 'Voer je telefoonnummer in';
    }
    if (strlen($telefoon) > 10) {
        $errorMsg[6][] = 'Voer een geldige telefoonnummer in';
    }

    if (empty($errorMsg)) {
        try {
            $select_stat = $db->prepare(
                'SELECT name,email FROM users WHERE email = :email'
            );
            $select_stat->execute([':email' => $email]);
            $row = $select_stat->fetch(PDO::FETCH_ASSOC);

            if (isset($row['email']) == $email) {
                $errorMsg[1][] = 'Dit e-mailadres is al ingebruik';
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $created = new DateTime();
                $created = $created->format('Y-m-d H:i:s');

                $instert_stat = $db->prepare(
                    'INSERT INTO users (name,email,password,straat,stad,postcode,telefoon,created) VALUES (:name,:email,:password,:straat,:stad,:postcode,:telefoon,:created)'
                );

                if (
                    $instert_stat->execute([
                        ':name' => $name,
                        ':email' => $email,
                        ':password' => $hashed_password,
                        ':straat' => $straat,
                        ':stad' => $stad,
                        ':postcode' => $postcode,
                        ':telefoon' => $telefoon,
                        ':created' => $created,
                    ])
                ) {
                    header('location: index.php?page=login');
                }
            }
        } catch (PDOException $e) {
            $pdoError = $e->getMessage();
        }
    }
}
?>
