<?php

if (!isset($_SESSION['user'])) {
    header('location: index.php?page=login');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

	<title>Sopranos Pizza - Mijn Account</title>
</head>
<body>
	<div class="title">
        <h1>Sopranos Pizza - Mijn Account</h1>
    </div>
    <hr class="secondary">
	<div class="container account-container">
	<div class="row">
		<div class="col">
			<?php echo '<h3>Welkom ' . $_SESSION['user']['name'] . '</h3>'; ?>
			<label class="account-bold"> Je e-mailadres is: </lables></label>
			<?php echo '<p class="main-text">' . $_SESSION['user']['email'] . ' </p>'; ?>
			<label class="account-bold"> Je adres is: </lables></label>
			<?php echo '<p class="main-text">' .
       $_SESSION['user']['straat'] .
       '<br>' .
       $_SESSION['user']['stad'] .
       '<br>' .
       $_SESSION['user']['postcode'] .
       '</p>'; ?>
		</div>
		<div class="col">
			<?php echo '<p>Je telefoonnummer: ' . $_SESSION['user']['telefoon'] . '</p>'; ?>

</div>
	</div>
	<a class="btn btn-primary"href="index.php?page=logout">Logout</a>
	</div>
</body>
</html>