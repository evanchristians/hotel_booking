<?php
	include_once('config/config.php');
	include_once('classes/addUser.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
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
				$addUser = new addUser($conn);
				if (isset($_POST['register'])) {
					$addUser->checkUser($conn);
					$addUser->passValidation();
					$addUser->emailValidation();
					$addUser->confirmUser($conn);
				}
			?>
			<h2>Sign Up</h2>
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="inputs">
					<div class="field">

						<i class="fas fa-user"></i>
						<input type="text" name="name" placeholder="name" value="<?php if(isset($_POST['register'])){ echo $_POST['name']; } ?>" autocomplete="off" > 

					</div>
					<div class="field">

						<i class="fas fa-user"></i>
						<input type="text" name="surname" placeholder="surname" value="<?php if(isset($_POST['register'])){ echo $_POST['surname']; } ?>" autocomplete="off" > 

					</div>
					<div class="field">

						<i class="fas fa-envelope"></i>
						<input type="email" name="email" value="<?php if(isset($_POST['register'])){ echo $_POST['email']; } ?>" placeholder="you@example.com" autocomplete="off" > 

					</div>
					<div class="field">

						<i class="fas fa-lock"></i>
						<input type="password" name="pw" placeholder="password">

					</div> 
					<div class="field">

						<i class="fas fa-lock"></i>
						<input type="password" name="c_pw" placeholder="confirm password">

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