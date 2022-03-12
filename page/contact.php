<?php
include_once '.\components\email.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="components\css\styles.css"/>
	<script defer src="components\js\maps.js"></script>
	<title>Sopranos Pizza - Contact</title>
</head>
<body>
	<div class="title">
        <h1>Sopranos Pizza - Contact</h1>
    </div>
    <hr class="secondary">
	<div class="container contact-info">
		<div class="row">
			<div class="col-md-3">
				<div id="map"></div>
			</div>
			<div class="col">
				<label class="contact-bold">Telefoonnummer:</label>	
				<p class="main-text">0612345678</p>
				<label class="contact-bold">E-mailadres:</label><br>
				<a href="mailto:yourmail@mail.com?subject=Contact Via Website" class="main-text">sopranos_pizza@gmail.com</a> 
			</div>
			<div class="col">
				<label class="contact-bold">Adres:</label>
				<p class="main-text">Een straat 1, 1234AA, Een Stad</p>
				<label class="contact-bold">Openingstijden:</label>
				<p class="main-text">Maandag tot en met zondag: <br> 13:00 tot 22:00 uur</p>
			</div>
		</div>
	</div>
    <div class="container">
        <div class="container contact">
	        <div class="row">
		        <div class="col-sm-3">
			        <div class="contact-form-info">
				        <h3>Neem contact met ons op via deze formulier</h3>
			        </div>
		        </div>
		    <div class="col">
				<form action="index.php?page=contact" method="post">
					<div class="contact-form">
							<div class="form-group">
								<label class="control-label col-sm" for="name">Voor- en Achternaam:</label>
								<div class="col-sm-5">          
									<input type="text" class="form-control" id="name" placeholder="Jane Doe" name="name">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="phone">Telefoonnummer:</label>
								<div class="col-sm-5">          
									<input type="tel" class="form-control" id="phone" placeholder="0612345678" maxlength="12" name="phone">
								</div>
							</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">E-mailadres:</label>
							<div class="col-sm-5">
								<input type="email" class="form-control" id="email" placeholder="jane@doe.com" name="email">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm" for="subject">Onderwerp</label>
							<div class="col-sm-5">          
								<input type="text" class="form-control" id="subject" placeholder="Tip" name="subject">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="message">Message:</label>
							<div class="col-sm-5">
								<textarea name="message" class="form-control" rows="5" cols="10" id="message"></textarea>
							</div>
						</div>
						<div class="form-group">        
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default" name="submit">Verzend</button>
							</div>
							</div>
						</div>
					</div>
				</form>
	        </div>
        </div>
    </div>
<script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
<script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsZaN23pr6SGfE8IzfmK2BcJqhCPPhLuE&callback=initMap&libraries=&v=weekly"
      async
    ></script>
</body>
</html>