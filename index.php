<?php
	include_once('classes/logUser.php');
	include_once('config/config.php');
	session_start();
		if (isset($_POST['logout'])) {
		session_destroy();
	}
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<header>
		<h2>HotelBooking</h2>
	</header>
	<main class="hidden">
		<div class="logbox">
			<?php
				if (isset($_POST['login'])) {
					$logUser = new logUser($conn);
					$logUser->checkUser($conn);
					$logUser->checkPass();
					$logUser->checkCred();
				}
			?>
			<h2>Sign in</h2>
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="inputs">
					<div class="field">

						<i class="fas fa-envelope"></i>
						<input type="email" name="email" value="<?php if(isset($_POST['login'])){ echo $_POST['email'];}else if(isset($_SESSION['reg_user'])){echo $_SESSION['reg_user'];} ?>" placeholder="you@example.com" autocomplete="off"> 

					</div>
					<div class="field">

						<i class="fas fa-lock"></i>
						<input type="password" name="pw" placeholder="password" value="">

					</div>
					<button type="submit" name="login" id="login">Sign in</button>
				</div>
			</form>
			<p>
				Don't have an account yet? <a href="register.php">Sign up</a>.
			</p>
			<?php $conn->close(); ?>
		</div>
	</main>
	<footer>
		<h2>copyright &copy EVAN CHRISTIANS <?php echo date("Y") ?></h2>
	</footer>
	<script>
		$(window).on("load", function() {
			$('main').fadeIn(355).removeClass('hidden');

			$("button").click(function(){
				$("main").fadeOut(355).addClass('hidden');
			});

			$("a").click(function(){
				$("main").fadeOut(355).addClass('hidden');
			});
		});
	</script>
</body>
</html>