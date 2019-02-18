<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Confirmed | HotelBooking</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(window).on("load", function() {
      $('main').fadeIn(355).removeClass('hidden');

      setTimeout(function(){
				$("#redir").fadeOut(355).addClass('hidden');
        window.location.href = "book.php";
			}, 2500);

      $("button").click(function(){
        $("main").fadeOut(355).addClass('hidden');
      });

      $("a").click(function(){
        $("main").fadeOut(355).addClass('hidden');
      });
    });
  </script>
</head>
<body>
  <header>
    <h2>HotelBooking</h2>
    <form action="index.php" method="post">
      <h3>
        Logged in as&nbsp<span class="cap"><?php echo $_SESSION['user'] . " " . $_SESSION['surname']; ?></span>&nbsp|&nbsp<button class="link" type="submit" name="logout">Sign out</button>
      </h3>
    </form>
  </header>
  <main class="hidden">
    <h2>Booking Cancelled</h2>
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    <h3>Returning to booking page..</h3>
  </main>
  <footer>
    <h2>copyright &copy EVAN CHRISTIANS <?php echo date("Y") ?></h2>
  </footer>
</body>
</html>