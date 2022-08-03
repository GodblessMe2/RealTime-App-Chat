<?php 
session_start();
  require_once("config.php");
  $outgoing = $_SESSION['unique_id'];

  $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
  $output = "";

  $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing} AND (firstname LIKE '%{$searchTerm}%' OR lastname LIKE '%{$searchTerm}%') ");

  if (mysqli_num_rows($sql) > 0) {
      // code...
     include_once "data.php";
  } else {
    $output .= "No user found";
  }

  echo $output;
 ?>