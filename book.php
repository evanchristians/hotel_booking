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
  <?php
  if (isset($_SESSION['user'])) {
    ?>
    <h3>
      Logged in as <?php echo $_SESSION['user']; ?> | &nbsp <a href="index.php">Sign out</a>
    </h3>
  </header>
    <?php
  } else {
    ?>
    <h3>
      <a href="register.php">Create an account</a> &nbsp | &nbsp <a href="index.php">Sign in</a>
    </h3>
  </header>
  <main>
    <h1>Welcome to HotelBooking.com</h1>
    <p class="hero_greeting">
      To make a booking
      <a href="index.php" class="cta">Sign in</a> or 
      <a href="register.php" class="cta">Create an account</a>
    </p>
  </main>
    <?php
  }
  ?>
  <footer>
  </footer>
</body>
</html>