<?php 

  session_start();
//  echo "Hello World I love what God has done"; 
require_once('config.php');

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Check input is empty and return a message
if (!empty($email) && !empty($password)) {
	// code...
	// Get the email and password and check if its in the table
	$sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
	// check if the credentials is met
	if (mysqli_num_rows($sql) > 0) {
		// code...
		$row = mysqli_fetch_assoc($sql);
		// using session for user unique_id in other php  file
        $_SESSION['unique_id'] = $row['unique_id'];
        echo "success";
	} else {
		echo "Email or Password is incorrect!";
	}

} else {
	echo "All input are required!";
}

 ?>