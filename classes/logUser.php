<?php
  class logUser {
    public $email_check = false;
    public $pass_check = false;
    public $user_result;
    public $user_row;
    public $email;
    
    // CREATE TABLE OF USERS
    function __construct($conn) {
      $sql_create_table = "CREATE TABLE IF NOT EXISTS tbl_users(
        id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(32) NOT NULL,
        surname VARCHAR(32),
        email VARCHAR(64) NOT NULL,
        password VARCHAR(64) NOT NULL
        );";
      $conn->query($sql_create_table);
    }

    // CHECK IF USER EXISTS
    function checkUser($conn) {
      $this->email = $_POST['email'];
      $sql_check_email = "SELECT * FROM tbl_users WHERE email = '$this->email'";
      $this->user_result = $conn->query($sql_check_email);
      $this->user_row = $this->user_result->fetch_array(MYSQLI_ASSOC);
      if (empty($_POST['email'])) {
        ?>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
          Please enter an email address
        </div>
        <?php
      } else if (!$this->user_row) {
        ?>
          <div class="error">
            <i class="fas fa-exclamation-circle"></i>
            User does not exist
          </div>
        <?php
        // die();
      } else {
        $this->email_check = true;
      }
      return $this->user_row;
    }

    // CHECK IF PASSWORD WAS INPUT 
    function checkPass() {
      if (empty($_POST["pw"])) {
        ?>
        <div class="error">
          <i class="fas fa-exclamation-circle"></i>
          Please enter your password
        </div>
        <?php
      } else {
        $this->pass_check = true;
      }
    }
    // CHECK IF CREDENTIALS MATCH
    function checkCred() {
      if ($this->email_check && $this->pass_check) {
        $password = $_POST['pw'];
        if ($this->user_row['password'] == $password) {
          header("Location: book.php");
          $_SESSION['user'] = $this->user_row['name'];
          $_SESSION['surname'] = $this->user_row['surname'];
          $_SESSION['email'] = $this->user_row['email'];
        } else {
          ?>
            <div class="error">
              <i class="fas fa-exclamation-circle"></i>
              Incorrect password!
            </div>
          <?php
        }
      }
    }
  }
?>
