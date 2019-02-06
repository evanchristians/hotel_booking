<?php
require_once('user.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn){
  echo "error " . $conn->error;
}
?>