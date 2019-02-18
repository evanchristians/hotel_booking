<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Success | HotelBooking</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
		$(window).on("load", function() {
			$('main').fadeIn(355).removeClass('hidden');
			setTimeout(function(){
				$("main").fadeOut(355).addClass('hidden');
        window.location.href = "index.php";
			}, 2000);
		});
	</script>
</head>
<body>
  <header>
    <h2>HotelBooking</h2>
  </header>
  <main class="hidden" id="redir">
    <section>
      <h2>Account created successfully</h2>
      <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
      <h3>Redirecting..</h3>
    </section>
  </main>
  <footer>
    <h2>copyright &copy EVAN CHRISTIANS <?php echo date("Y") ?></h2>
  </footer>
</body>
</html>