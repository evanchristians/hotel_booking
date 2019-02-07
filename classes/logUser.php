<?php
  class logUser {
    public $email_check = false;
    public $user_result;
    public $user_row;
    public $email;

    // CHECK IF USER EXISTS
    function checkUser($conn) {
      $this->email = $_POST['email'];
      $sql_check_email = "SELECT * FROM users WHERE email = '$this->email'";
      $this->user_result = $conn->query($sql_check_email);
      $this->user_row = $this->user_result->fetch_array(MYSQLI_ASSOC);
      if (!$this->user_row) {
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

    // CHECK IF CREDENTIALS MATCH
    function checkCred() {
      if ($this->email_check) {
        $password = $_POST['pw'];
        if ($this->user_row['password'] == $password) {
          echo "user: " . $this->user_row['name'] . " logged in successfully";
          header("Location: book.php");
          $_SESSION['user'] = $this->user_row['name'];
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
