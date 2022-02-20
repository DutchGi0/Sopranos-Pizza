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

<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<title>Register</title>
    <style>
        .register {color: #feb123;}
    </style>
</head>
<body>
	<div class="container">
		
		<form action="index.php?page=register" method="post">
			
			<div class="mb-3">
                <?php if (isset($errorMsg[1])) {
                    foreach ($errorMsg[1] as $emailErrors) {
                        echo '<p class="small  text-danger">' .
                            $emailErrors .
                            '</p>';
                    }
                } ?>
				<label for="email" class="form-label">E-mailadres</label>
				<input type="email" name="email" class="form-control" placeholder="example@example.com">
			</div>
			<div class="mb-3">
                 <?php if (isset($errorMsg[2])) {
                     foreach ($errorMsg[2] as $passwordErrors) {
                         echo '<p class="small  text-danger">' .
                             $passwordErrors .
                             '</p>';
                     }
                 } ?>
				<label for="password" class="form-label">Wachtwoord</label>
				<input type="password" name="password" class="form-control" placeholder="">
			</div>
            <div class="mb-3 ">
                <?php if (isset($errorMsg[0])) {
                    foreach ($errorMsg[0] as $nameErrors) {
                        echo '<p class="small  text-danger">' .
                            $nameErrors .
                            '</p>';
                    }
                } ?>
				<label for="name" class="form-label">Naam</label>
				<input type="text" name="name" class="form-control" placeholder="Voor- en achternaam">
			</div>
            <div class="mb-3">
                <?php if (isset($errorMsg[3])) {
                    foreach ($errorMsg[3] as $straatErrors) {
                        echo '<p class="small  text-danger">' .
                            $straatErrors .
                            '</p>';
                    }
                } ?>
				<label for="straat" class="form-label">Straat</label>
				<input type="text" name="straat" class="form-control" placeholder="Leidseplein 21">
				
			</div>
            <div class="mb-3">
                <?php if (isset($errorMsg[4])) {
                    foreach ($errorMsg[4] as $stadErrors) {
                        echo '<p class="small  text-danger">' .
                            $stadErrors .
                            '</p>';
                    }
                } ?>
				<label for="stad" class="form-label">Stad</label>
				<input type="text" name="stad" class="form-control" placeholder="Amsterdam">
				
			</div>
            <div class="mb-3">
                <?php if (isset($errorMsg[5])) {
                    foreach ($errorMsg[5] as $postcodeErrors) {
                        echo '<p class="small  text-danger">' .
                            $postcodeErrors .
                            '</p>';
                    }
                } ?>
				<label for="postcode" class="form-label">Postcode</label>
				<input type="text" name="postcode" class="form-control" placeholder="1234AA">
				
			</div>
            <div class="mb-3">
                <?php if (isset($errorMsg[6])) {
                    foreach ($errorMsg[6] as $telefoonErrors) {
                        echo '<p class="small  text-danger">' .
                            $telefoonErrors .
                            '</p>';
                    }
                } ?>
				<label for="telfoon" class="form-label">Telefoon nummer</label>
				<input type="text" name="telefoon" class="form-control" placeholder="0612345678">
				
			</div>
			<button type="submit" name="register_btn" class="btn btn-primary">Register</button>
		</form>
		Already Have an Account? <a class="register" href="index.php?page=login">Login Instead</a>
	</div>
</body>
</html>