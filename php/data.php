<?php 

	while ($row = mysqli_fetch_assoc($sql)) {
		$sql2 = "SELECT * FROM messages WHERE (incoming_msg = {$row['unique_id']} OR outgoing_msg = {$row['unique_id']}) AND (incoming_msg = {$outgoing} OR outgoing_msg = {$outgoing}) ORDER BY msg_id DESC LIMIT 1";
		$query2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($query2);
		if (mysqli_num_rows($query2) > 0) {
			// code...
			$result = $row2['msg'];
		} else {
	  		// code...
	  		$result = "No Message Avaliable";

		}
		// Trim the message if it long
		(strlen($result) > 28) ? $msg = substr($result, 0, 28).'.....' : $msg = $result;
		($outgoing == $row2['outgoing_msg']) ? $checkMsg = "gg-check" : $checkMsg = "";
		// Check if user is online or offline 
		($row['status'] === "offline") ? $offline = "offline" : $offline = "";
  		$output .= '
  		   <a href="chatroom.php?user_id='.$row['unique_id'].'">
			   <div class="user-content">
					<img src="php/images/'. $row['image'] .'" alt="hello">
					<div class="user-details">
						<span> '. $row['firstname']. " " . $row ['lastname'] .'</span>
						<span class="'.$checkMsg.'"></span><p>'.$msg.'</p>
					</div>
				</div>
				<div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
			</a>
		';
    }

?>