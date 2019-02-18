<?php 
  session_start(); 
  include_once('config/config.php');
  include_once('classes/makeBooking.php');
  // unset($_SESSION['editted']);
  unset($_SESSION['edit_booking']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Confirmation | HotelBooking</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
</head>
<body>
  <header>
  <h2>HotelBooking</h2>
  <?php
  if (isset($_SESSION['user'])) {
    $makeBooking = new makeBooking($conn);
    if (isset($_POST['confirm_booking'])){
      $makeBooking->confirmBooking($conn);
    }
    if (isset($_POST['edit_booking'])) {
      $_SESSION['edit_booking'] = true;
      header("Location: book.php");
    }
    if (isset($_SESSION['editted'])) {
      unset($_SESSION['edit_booking']);
      header("Location: conf_booking.php");
    }
    if (isset($_POST['cancel_booking'])) {
      $makeBooking->cancelBooking($conn);
    } 
    ?>
    <form action="index.php" method="post">
      <h3>
        Logged in as&nbsp<span class="cap"><?php echo $_SESSION['user'] . " " . $_SESSION['surname']; ?></span>&nbsp|&nbsp<button class="link" type="submit" name="logout">Sign out</button>
      </h3>
    </form>
  </header>
  <main class="hidden" style="padding-bottom: 2em">
    <h2>Would you like to confirm this booking?</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php $makeBooking->showBooking($conn);
       ?>

    </form>
  </main>
    <?php
  } else {
    ?>
    <h3>
      <a href="register.php">Create an account</a> &nbsp | &nbsp <a href="index.php">Sign in</a>
    </h3>
  </header>
  <main class="hero hidden">
    <section>
      <h1>HotelBooking</h1>
      <p class="hero_greeting">
        To make a booking
        <a href="index.php" class="cta">Sign in</a> or 
        <a href="register.php" class="cta">Create an account</a>
      </p>
    </section>
  </main>
  <?php
  }
  ?>
  <footer>
    <h2>copyright &copy EVAN CHRISTIANS <?php echo date("Y") ?></h2>
  </footer>
</body>
</html>