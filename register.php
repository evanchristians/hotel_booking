<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
	<header>
		<h2>BookingSauce</h2>
	</header>
	<main>
		<div class="logbox">
			<!-- <div class="error">error text</div> -->
			<?php
				if (isset($_POST['register'])) {
					if ($_POST["pw"] === $_POST["c_pw"]) {
						?>
							<div class="success">Registered Successfully</div>
						<?php
					} else {
						?>
							<div class="error">Passwords Do Not Match</div>
						<?php
					} 
				}
			?>
			<h2>Sign Up</h2>
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="inputs">
					<div class="field">

						<i class="fas fa-envelope"></i>
						<input type="text" name="email" value="" placeholder="you@example.com" autocomplete="off">

					</div>
					<div class="field">

						<i class="fas fa-lock"></i>
						<input type="password" name="pw" placeholder="password">

					</div>
					<div class="field">

						<i class="fas fa-lock"></i>
						<input type="password" name="c_pw" placeholder="confirm password">

					</div>
					<button type="submit" name="register">Sign Up</button>
				</div>
			</form>
			<p>
				Already have an account? <a href="index.php">Sign in</a>.
			</p>
		</div>

	</main>
	<footer>
		<h2>copyright &copy EVAN CHRISTIANS 2018</h2>
	</footer>
</body>
</html>