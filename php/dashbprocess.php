<?php 
  session_start();
  require_once("config.php");
  $outgoing = $_SESSION['unique_id'];
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing} ");
  $output = "";

  // if one user is active return a message 
  if (mysqli_num_rows($sql) == 1) {
  	// code...
  	$output .= "No Users avaliable to chat";
  	// if more than one is active return use 
  }elseif (mysqli_num_rows($sql) > 0) {
	  	
  	include_once "data.php";
  }

  echo $output;
?>