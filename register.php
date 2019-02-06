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
			<?php
				if (isset($_POST['register'])) {

					$pass_auth = true;
					$email_auth = true;

					// PASSWORD VALIDATION

					if ($_POST["pw"] !== $_POST["c_pw"]) {
						$pass_auth = false;
						?>
							<div class="error">
								<i class="fas fa-exclamation-circle"></i>
								Passwords do not match
							</div>
						<?php
					}
					
					// EMAIL VALIDATION

					if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
						$email_auth = false;
						?>
							<div class="error">
								<i class="fas fa-exclamation-circle"></i>
								Enter a valid email address
							</div>
						<?php
					}

					if ($pass_auth && $email_auth) {
						header("Location: index.php");
						die();
					}

				}
			?>
			<h2>Sign Up</h2>
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="inputs">
					<div class="field">

						<i class="fas fa-envelope"></i>
						<input type="text" name="email" value="<?php if(isset($_POST['register'])){ echo $_POST['email']; } ?>" placeholder="you@example.com" autocomplete="off" required> 

					</div>
					<div class="field">

						<i class="fas fa-lock"></i>
						<input type="password" name="pw" placeholder="password" required>

					</div>
					<div class="field">

						<i class="fas fa-lock"></i>
						<input type="password" name="c_pw" placeholder="confirm password" required>

					</div>
					<button type="submit" name="register">Sign up</button>
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