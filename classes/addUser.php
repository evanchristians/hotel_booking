<?php

  include_once('./config/conn.php');

  class addUser {
    public $pass_auth = true;
    public $email_auth = true;
    public $no_user = true; 
    public $email;

    // CREATE TABLE OF USERS
    function __construct($conn) {
      $sql_create_table = "CREATE TABLE IF NOT EXISTS users(
        id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(64) NOT NULL,
        password VARCHAR(64) NOT NULL
        );";
      $conn->query($sql_create_table);
    }

    // CHECK IF USER EXISTS
    function checkUser($conn) {
      $email = $_POST['email'];
      $sql_check_user = "SELECT * FROM users WHERE email = '$email'";
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
    }

    // PASSWORD VALIDATION
    function passValidation() {
      if ($_POST["pw"] !== $_POST["c_pw"]) {
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
      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $this->email_auth = false;
        ?>
          <div class="error">
            <i class="fas fa-exclamation-circle"></i>
            Enter a valid email address
          </div>
        <?php
        return $this->email_auth;
      }


    }

    // CONFIRM NEW USER
    function confirmUser($conn) {
        if ($this->pass_auth && $this->email_auth && $this->no_user) {
          $email = $_POST['email'];
          $password = $_POST['pw'];
          $sql_new_user = "INSERT INTO users(email, password) VALUES ('$email', '$password')";
          if (!$conn->query($sql_new_user)) {
            echo "error: " . $conn->error;
          } else {
            header("Location: index.php");
            die();

          }
        }

      }

  }

?>