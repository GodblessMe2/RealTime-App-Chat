<?php session_start(); 
// The user did not login redirect to login session
  if (!isset($_SESSION['unique_id'])) {
  	// code...
  	header("location: login.php");
  }
?>

<?php include_once "php/header.php" ?>
<body>
	<div class="wrapper">
		<section class="chat-room">
			<header>
				<?php 
				require_once("php/config.php");
				$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
				$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
				// check if unique_id is the database
				if (mysqli_num_rows($sql) > 0) {
					// code...
					$row = mysqli_fetch_assoc($sql);
				}

				 ?>
				<a href="dashboard.php" class="chat-icon"><i class="fas fa-arrow-left"></i></a>
				<img src="php/images/<?php echo $row['image'] ?>" alt="">
				<div class="chat-room-details">
					<span><?php echo $row['firstname']. " " .$row['lastname']; ?></span>
					<p><?php echo $row['status']; ?></p>
				</div>
			</header>

			<div class="chat-body">
				
			</div>
			<form action="#" class="message-typing">
				<input type="" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
				<input type="" name="incoming_id" value="<?php echo $user_id?>" hidden>
				<input type="text" class="input-message" name="message-typing" placeholder="Type Your Message...">
				<button><i class="fab fa-telegram-plane"></i></button>
			</form>
		</section>
	</div>
 <!-- <script src="js/all.min.js"></script> -->
 <script src="js/chat.js"></script>
</body>
</html>