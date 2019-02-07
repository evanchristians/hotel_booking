<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Make a booking</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <header>
  <h2>HotelBooking</h2>
  <h3>
    Logged in as <?php echo $_SESSION['user']; ?> | <a href="index.php">Sign out</a>
  </h3>
  </header>
  <main>
  </main>
  <footer>
  </footer>
</body>
</html>