<?php
  class addUser {
    public $pass_auth = true;
    public $email_auth = true;
    public $no_user = true; 
    public $email;

    // CREATE TABLE OF USERS
    function __construct($conn) {
      $sql_create_table = "CREATE TABLE IF NOT EXISTS tbl_users(
        id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(32) NOT NULL,
        email VARCHAR(64) NOT NULL,
        password VARCHAR(64) NOT NULL
        );";
      $conn->query($sql_create_table);
    }

    // CHECK IF USER EXISTS
    function checkUser($conn) {
      if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $sql_check_user = "SELECT * FROM tbl_users WHERE email = '$email'";
        $check_user = $conn->query($sql_check_user);
        $user_row = $check_user->fetch_array(MYSQLI_ASSOC); 
        if ($user_row['email'] === $email) {
            $this->no_user = false;
          ?>
            <div class="error">
              <i class="fas fa-exclamation-circle"></i>
              User already exists
            </div>
          <?php
          return $this->no_user;
        }
      } else {
        ?>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
          Please enter an email address
        </div>
      <?php
      }
    }

    // PASSWORD VALIDATION
    function passValidation() {
      if (empty($_POST["pw"])) {
        $this->pass_auth = false;
        ?>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
          Please enter a password
        </div>
        <?php
        return $this->pass_auth;
      } else if ($_POST["pw"] !== $_POST["c_pw"]) {
        $this->pass_auth = false;
        ?>
          <div class="error">
            <i class="fas fa-exclamation-circle"></i>
            Passwords do not match
          </div>
        <?php
        return $this->pass_auth;
      }
    }
    
    // EMAIL VALIDATION
    function emailValidation() {
      if (empty($_POST['email'])) {
        $this->email_auth = false;
        ?>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
          Please enter an email address
        </div>
        <?php
        return $this->email_auth;
      }
      else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $this->email_auth = false;
        ?>
          <div class="error">
            <i class="fas fa-exclamation-circle"></i>
            Please enter a valid email address
          </div>
        <?php
        return $this->email_auth;
      }
    }

    // CONFIRM NEW USER
    function confirmUser($conn) {
        if ($this->pass_auth && $this->email_auth && $this->no_user) {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['pw'];
          $sql_new_user = "INSERT INTO tbl_users(name, email, password) VALUES ('$name', '$email', '$password')";
          if (!$conn->query($sql_new_user)) {
            echo "error: " . $conn->error;
          } else {
            $_SESSION['reg_user'] = $email;
            header("Location: reg_success.php");
            die();

          }
        }

      }

  }

?>