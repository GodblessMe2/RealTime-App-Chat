<?php
$conn = mysqli_connect("localhost", "root", "Accountant1234", "chatapp" );

if (!$conn) {
  # code...
  echo "Wrong connection" . mysqli_connect_error();
} 

?>