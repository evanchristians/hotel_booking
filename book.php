<?php 
  session_start(); 
  include_once('config/config.php');
  include_once('classes/makeBooking.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Make a booking</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
</head>
<body>
  <header>
  <h2>HotelBooking</h2>
  <?php
  if (isset($_SESSION['user'])) {
    $makeBooking = new makeBooking($conn);
    if(isset($_POST['book'])) {
      $makeBooking->insertBooking($conn);
      $makeBooking->showBooking($conn);
    }
    ?>
    <form action="index.php" method="post">
      <h3>
        Logged in as&nbsp<span class="cap"><?php echo $_SESSION['user']; ?></span>&nbsp|&nbsp<button class="link" type="submit" name="logout">Sign out</button>
      </h3>
    </form>
  </header>
  <main>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="grid">
        <div class="logbox">
          <h2>Make a booking</h2>
          <div class="inputs">
            <div class="field date">
              <span class="label_mini">
                <label for="hotel">Select a hotel</label>
              </span>
              <div>
                <i class="fas fa-hotel"></i>
                <select name="hotel" id="">
                  <option value="lsb">Long Street Backpackers</option>
                  <option value="dlla">Daddy Long Legs Art Hotel</option>
                  <option value="ttb">The Table Bay Hotel</option>
                  <option value="dth">DoubleTree by Hilton Hotel</option>
                </select>
              </div>
            </div>
            <div class="field date">
              <span class="label_mini">
                <label for="date_in">Check-in</label>
              </span>
              <div>
                <i class="far fa-calendar-alt"></i>
                <input type="date" name="date_in" value="<?php echo date('Y-m-d');?>">
              </div>
            </div>
            <div class="field date">
              <span class="label_mini">
                <label for="date_out">Check-out</label>
              </span>
              <div>
                <i class="far fa-calendar-alt"></i>
                <input type="date" name="date_out" value="<?php echo date('Y-m-d');?>">
              </div>
            </div>
            <div class="field">
              <div class="drop_down"> 
                <span class="label_mini">
                  <label for="guests">No. guests</label>            
                </span>
                <select name="guests">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              <div class="drop_down">
                <span class="label_mini">
                  <label for="rooms">No. rooms</label>             
                </span>
                <select name="rooms">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
            </div>
            <button type="submit" name="book" id="book">Make booking</button>
          </div>
        </div>
        <div id="hotel_image">
          <div class="overlay">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
          <div class="hotel_desc">
            <h2 id="hotel_name">Long Street Backpackers</h2>
          </div>
        </div>
    </form>
  </main>
    <?php
  } else {
    ?>
    <h3>
      <a href="register.php">Create an account</a> &nbsp | &nbsp <a href="index.php">Sign in</a>
    </h3>
  </header>
  <main class="hero">
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
  </footer>
  <script>
    $( "select" ).change(function() {
      var sel = $( "select option:selected" );
      window.console&&console.log(sel.val());
      if (sel.val() === "lsb") {
        $( "#hotel_image" ).css("background-image", "url('assets/lsb.png')");
        $( "#hotel_name" ).text("Long Street Backpackers");
        // $( "#stars").prependTo()
      } else if(sel.val() === "dlla") {
        $( "#hotel_image" ).css("background-image", "url('assets/dlla.png')");
        $( "#hotel_name" ).text("Daddy Long Legs Art Hotel & Self-Catering Apartments");
      } else if(sel.val() === "ttb") {
        $( "#hotel_image" ).css("background-image", "url('assets/ttb.png')");         
        $( "#hotel_name" ).text("The Table Bay Hotel");
      } else if(sel.val() === "dth") {   
        $( "#hotel_image" ).css("background-image", "url('assets/dth.png')");   
        $( "#hotel_name" ).text("DoubleTree by Hilton Hotel Cape Town - Upper Eastside");
      }      
    })  
  </script>
</body>
</html>