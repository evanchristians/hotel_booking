<?php
  class makeBooking { 
    public $user;
    public $email;
    public $date_in;
    public $date_out;
    public $hotel;
    public $guests;
    public $rooms;

    // CREATE TABLE FOR BOOKINGS AND HOTELS
    function __construct($conn) {

      // BOOKINGS
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

      // HOTELS
      $sql_hotel = "CREATE TABLE IF NOT EXISTS tbl_hotels (
        id INT(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        hotel_code VARCHAR(4) NOT NULL UNIQUE,
        hotel_name VARCHAR(100) NOT NULL,
        hotel_description VARCHAR(255) NOT NULL,
        hotel_stars INT(1) NOT NULL
        )";
      if(!$conn->query($sql_hotel)) {
        // echo "ERROR: " . $conn->error;
      }

      // HOTEL DEFAULT
      $sql_hotel_default = "INSERT INTO tbl_hotels(
        hotel_code, hotel_name, hotel_description, hotel_stars
        )
        VALUES(
        'lsb', 'Long Street Backpackers', 'lorem ipsum', '2'
        ),
        (
        'dlla', 'Daddy Long Legs Art Hotel & Self-Catering Apartments', 'lorem ipsum', '3'
        ),
        (
        'ttb', 'The Table Bay Hotel', 'lorem ipsum', '4'
        ),
        (
        'dth', 'DoubleTree by Hilton Hotel Cape Town - Upper Eastside','lorem ipsum', '5'
        )";
      if(!$conn->query($sql_hotel_default)) {
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
      $sql_show_booking = "SELECT * FROM  tbl_booking WHERE guest = '$this->email'";
      $sql_get_hotel = "SELECT * FROM tbl_hotels WHERE hotel_code = '$this->hotel'";
      $get_hotel = $conn->query($sql_get_hotel);
      $hotel_row = $get_hotel->fetch_array(MYSQLI_ASSOC);
      $hotel_name = $hotel_row['hotel_name'];
      $date_in_obj = new DateTime($this->date_in);
      $date_out_obj = new DateTime($this->date_out);
      $difference = $date_in_obj->diff($date_out_obj)->format("%d");
      if($conn->query($sql_show_booking)) {
        ?>
        <div class="grid conf_grid">
          <span class="conf_title">Booking for</span>
          <span class="conf_data">
            <?php echo $this->user . " (" . $this->email . ")" ?>
          </span>
          <span class="conf_title">Hotel</span>
          <span class="conf_data">
            <?php echo $hotel_name ?>
          </span>
          <span class="conf_title">Number of guests</span>
          <span class="conf_data">
            <?php echo $this->guests ?>
          </span>
          <span class="conf_title">Number of rooms</span>
          <span class="conf_data">
            <?php echo $this->rooms ?>
          </span>
          <span class="conf_title">Duration</span>
          <span class="conf_data">
            <?php if($difference == 1) {
              echo $difference . " day";  
            } else {
              echo $difference . " days";
            }
            ?>
          </span>
          <span class="conf_title">Check-in</span>
          <span class="conf_data">
            <?php echo $date_in_obj->format("l, d F Y") ?>
          </span>
          <span class="conf_title">Check-out</span>
          <span class="conf_data">
            <?php echo $date_out_obj->format("l, d F Y") ?>
          </span>
        </div>
        <button type="submit" name="confirm_booking">
          <i class="fas fa-check"></i>
          Confirm
        </button>
        <button type="submit" name="edit_booking">
          <i class="fas fa-edit"></i>          
          Edit
        </button>
        <button type="submit" name="cancel_booking">
          <i class="fas fa-trash"></i>              
          Cancel
        </button>
        <?php
      } else {
        echo "ERROR: " . $conn->error;
      }
    }
  }
?>