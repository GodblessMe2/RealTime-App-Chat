<?php 
   session_start();

   if (isset($_SESSION['unique_id'])) {
 	// code...
 	require_once("config.php");

	$outgoing = mysqli_real_escape_string($conn, $_POST["outgoing_id"]);
	$incoming = mysqli_real_escape_string($conn, $_POST["incoming_id"]);
	$output = "";
	
	$sql = "SELECT * FROM messages 
	        LEFT JOIN users ON users.unique_id = messages.incoming_msg
	        WHERE (outgoing_msg = {$outgoing} AND incoming_msg = {$incoming}) OR (outgoing_msg = {$incoming} AND incoming_msg = {$outgoing}) ORDER BY msg_id";

	$query = mysqli_query($conn, $sql);

	if (mysqli_num_rows($query) > 0) {
		// code...
		while ($row = mysqli_fetch_assoc($query)) {

			// if the outgoing message is equal to $outgoing when the sender is send a message 
			if ($row['outgoing_msg'] === $outgoing) {
				// code...
				$output .= '<div class="chat outgoing">
								<div class="chat-body-details">
									<p>'. $row['msg'] .'</p>					
								</div>
				            </div>';
			} else {
				// a message is receive 
				$output .= '<div class="chat incoming">
					<img src="php/images/'. $row['image'] .'" alt="">
					<div class="chat-body-details">
						<p>'. $row['msg'] .'</p>						
					</div>
				</div>'; 
			}
			
		}

		echo $output;
	}
 }  else {
 	 header("location: ..login.php");
 }
 ?>   