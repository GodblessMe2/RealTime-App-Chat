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
		<section class="user">
			<header>
				<?php 
				require_once("php/config.php");
				$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
				// check if unique_id is the database
				if (mysqli_num_rows($sql) > 0) {
					// code...
					$row = mysqli_fetch_assoc($sql);
				}

				 ?>
				<div class="content">
					<img src="php/images/<?php echo $row['image'] ?>" alt="">
					<div class="details">
						<span><?php echo $row['firstname']. " " .$row['lastname']; ?></span>
						<p><?php echo $row['status'] ?></p>
					</div>
				</div>
				<a href="#" class="logout">Logout</a>
			</header>

			<div class="search">
				<span class="text">Select an user to start chat</span>
				<input type="text" name="searchTerm" class="search-input" placeholder="Enter name to search">
				<button id="search-btn"><i class="fas fa-search"></i></button> 
			</div>

			<div class="user-list">
				
			</div>	
			
		</section>
	</div>
 <!-- <script src="js/all.min.js"></script> -->
 <script src="js/dashboard.js"></script>
</body>
</html>