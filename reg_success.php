<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Success</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <header>
    <h2>HotelBooking</h2>
  </header>
  <main class="redir">
    <p>Account created successfully</p>
    <p>Redirecting..</p>
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
  </main>
  <footer>
  </footer>
  <script>
    window.onload = setTimeout(function () {
      window.location.href = "index.php";
    }, 1500);
  </script>
</body>
</html>