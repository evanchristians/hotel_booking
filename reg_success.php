<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Success</title>
  <link rel="stylesheet" href="css/main.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('main').fadeIn(500).removeClass('hidden');
		});
	</script>
</head>
<body>
  <header>
    <h2>HotelBooking</h2>
  </header>
  <main class="redir">
    <section>
      <h2>Account created successfully</h2>
      <p>Redirecting..</p>
      <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </section>
  </main>
  <footer>
    <h2>copyright &copy EVAN CHRISTIANS <?php echo date("Y") ?></h2>
  </footer>
  <script>
    window.onload = setTimeout(function () {
      $("main").fadeOut(300).addClass('hidden');
      window.location.href = "index.php";
    }, 2000);
  </script>
</body>
</html>