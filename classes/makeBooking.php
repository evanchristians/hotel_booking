<?php
  class makeBooking { 
    public $user;
    public $email;
    public $date_in;
    public $date_out;
    public $hotel;
    public $guests;
    public $rooms;

    // CREATE TABLE FOR BOOKINGS
    function __construct($conn) {
      $sql_tbl_booking = "CREATE TABLE IF NOT EXISTS tbl_booking (
        id INT(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        time_created TIMESTAMP NOT NULL,
        guest VARCHAR(100) NOT NULL,
        guest_name VARCHAR(100) NOT NULL,
        date_in DATE NOT NULL,
        date_out DATE NOT NULL,
        hotel_code VARCHAR(4),
        num_guests INT(3),
        num_rooms INT(3)
        )";
      if(!$conn->query($sql_tbl_booking)) {
        // echo "ERROR: " . $conn->error;
      }
    }

    // INSERT A BOOKING
    function insertBooking($conn) {
      if (isset($_SESSION['email'])
      && isset($_SESSION['user'])
      && isset($_POST['book'])) {
        $this->email = $_SESSION['email'];
        $this->user = $_SESSION['user'];
        $this->date_in = $_POST['date_in'];
        $this->date_out = $_POST['date_out'];
        $this->hotel = $_POST['hotel'];
        $this->guests = $_POST['guests'];
        $this->rooms = $_POST['rooms'];
        $sql_booking_insert = "INSERT INTO tbl_booking(guest, guest_name, date_in, date_out, hotel_code, num_guests, num_rooms) 
                              VALUES('$this->email', '$this->user', '$this->date_in', '$this->date_out', '$this->hotel', '$this->guests', '$this->rooms')";
        if(!$conn->query($sql_booking_insert)) {
          // echo "ERROR: " . $conn->error;
        };
      }
    }

    // SHOW BOOKING BEFORE CONFIRM
    
    function showBooking($conn) {
      if (isset($_POST['book'])) {
        $sql_show_booking = "SELECT * FROM  tbl_booking WHERE guest = $this->email";
        $sql_get_hotel = "SELECT * FROM tbl_hotels WHERE hotel_code = $this->hotel";
        if(!$conn->query($sql_show_booking) OR !$conn) {
          // echo "ERROR: " . $conn->error;
        } else {
          echo "hello";
          ?>
            Booking for: <?php echo $this->email ?> <br>
            At the: <?php echo $this->hotelname ?> <br>
            from: <?php echo $this->date_in ?> to: <?php echo $this->date_out ?> <br>
          <?php
        }
      }
    }
  }
?>