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
        $errorMsg[] = 'Please enter a valid email address';
    } elseif (empty($password)) {
        $errorMsg[] = 'Invalid password';
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
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<title>Login</title>
    <style>
        .register {color: #feb123;}
    </style>
</head>
<body>
	<div class="container">

    <?php
    if (isset($_REQUEST['msg'])) {
        echo '<p class="alert alert-warning">' . $_REQUEST['msg'] . '</p>';
    }
    if (isset($errorMsg)) {
        foreach ($errorMsg as $loginError) {
            echo '<p class="alert alert-danger">' . $loginError . '</p>';
        }
    }
    ?>
		<form action="index.php?page=login" method="post">
      <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" placeholder="jane@doe.com">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="">
        </div>
			<button type="submit" name="login_btn" class="btn btn-primary">Login</button>
		</form>
    No Account? <a class="register" href="index.php?page=register">Register Instead</a>
	</div>
</body>
</html>