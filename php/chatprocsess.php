<?php 
 session_start();
 if (isset($_SESSION['unique_id'])) {
 	// code...
 	require_once("config.php");

	$outgoing = mysqli_real_escape_string($conn, $_POST["outgoing_id"]);
	$incoming = mysqli_real_escape_string($conn, $_POST["incoming_id"]);
	$message = mysqli_real_escape_string($conn, $_POST["message-typing"]);

	// Check if the is an input in the message input and send to the database 
	if(!empty($message)) {
	   $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg, outgoing_msg, msg) VALUES ({$incoming}, {$outgoing}, '{$message}')") or die();
	   
	}
 } else {
 	// code...
     header("..login.php");
 }
 
 


 ?>