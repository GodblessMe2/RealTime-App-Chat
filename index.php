<?php include_once "php/header.php" ?>
<body>
	<div class="wrapper">
		<section class="form signup">
			<header>RealTime App Chat</header>
			<form action="#" id="form" enctype='multipart/form-data' autocomplete="off">
				<div class="error-text"></div>
				<div class="name-details">
					<div class="field input">
						<label>First Name</label>
						<input type="text" name="firstname" placeholder="First Name" required>
					</div>
					<div class="field input">
						<label>Last Name</label>
						<input type="text" name="lastname" placeholder="Last Name" required>
					</div>
				</div>
				<div class="field input">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter your Email Address" required>
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter your password" id="password" required>
					<a href="#" class="icon"><i class="fas fa-eye" id="togglePassword"></i></a>
				</div>
				<div class="field image">
					<label>Select image</label>
					<input type="file" name="image" required>
				</div>
				<div class="field button">
					<input type="submit" name="submit" value="Continue to Chat" id="submit">
				</div>
			</form>

			<div class="direct-link">Already Signed Up? <a href="login.php">Login now</a></div>
		</section>
	</div>
 <!-- <script src="js/all.min.js"></script> -->
 <script src="js/passtoggle.js"></script>
 <script src="js/signup.js"></script>

</body>
</html>