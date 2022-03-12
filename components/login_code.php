<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/connection.php';
// session_start();

/*test account:
email = test@test.nl
password= test12
*/

if (isset($_SESSION['user'])) {
    header('location: index.php?page=welcome');
}

if (isset($_REQUEST['login_btn'])) {
    $email = filter_var(strtolower($_REQUEST['email']), FILTER_SANITIZE_EMAIL);
    $password = strip_tags($_REQUEST['password']);

    if (empty($email)) {
        $errorMsg[] = 'Voer een geldige e-mailadres in.';
    } elseif (empty($password)) {
        $errorMsg[] = 'Voer een wachtwoord in';
    } else {
        try {
            $select_stat = $db->prepare(
                'SELECT * from users where email = :email LIMIT 1'
            );
            $select_stat->execute([
                ':email' => $email,
            ]);
            $row = $select_stat->fetch(PDO::FETCH_ASSOC);

            if ($select_stat->rowCount() > 0) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user']['name'] = $row['name'];
                    $_SESSION['user']['email'] = $row['email'];
                    $_SESSION['user']['id'] = $row['id'];
                    $_SESSION['user']['straat'] = $row['straat'];
                    $_SESSION['user']['stad'] = $row['stad'];
                    $_SESSION['user']['postcode'] = $row['postcode'];
                    $_SESSION['user']['telefoon'] = $row['telefoon'];

                    header('location: index.php?page=welcome');
                } else {
                    $errorMsg[] =
                        'Verkeerde e-mailadress of wachtwoord ingevuld';
                }
            } else {
                $errorMsg[] = 'Verkeerde e-mailadress of wachtwoord ingevuld';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
