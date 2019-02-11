<?php
	include_once('classes/logUser.php');
	include_once('config/conn.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sign in</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
	<header>
		<h2>HotelBooking</h2>
	</header>
	<main>
		<div class="logbox">
			<?php
				if (isset($_POST['login'])) {
					$logUser = new logUser($conn);
					$logUser->checkUser($conn);
					$logUser->checkCred();
				}
				if (isset($_POST['logout'])) {
					session_destroy();
				}
			?>
			<h2>Sign in</h2>
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="inputs">
					<div class="field">

						<i class="fas fa-envelope"></i>
						<input type="text" name="email" value="<?php if(isset($_POST['login'])){ echo $_POST['email']; } ?>" placeholder="you@example.com" autocomplete="off" required> 

					</div>
					<div class="field">

						<i class="fas fa-lock"></i>
						<input type="password" name="pw" placeholder="password" required>

					</div>
					<button type="submit" name="login">Sign in</button>
				</div>
			</form>
			<p>
				Don't have an account yet? <a href="register.php">Sign up</a>.
			</p>
			<?php $conn->close(); ?>
		</div>
	</main>
	<footer>
		<h2>copyright &copy EVAN CHRISTIANS 2018</h2>
	</footer>
</body>
</html>