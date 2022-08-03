<?php include_once "php/header.php" ?>
<body>
	<div class="wrapper">
		<section class="form signup">
			<header>RealTime App Chat</header>
			<form action="#" id="form">
				<div class="error-text"></div>
				<div class="field input">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter your Email Address" required>
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter your password" id="password" required>
					<a href="#" class="icon"><i class="fas fa-eye" id="togglePassword"></i></a>
				</div>
				<div class="field button">
					<input type="submit" name="submit" value="Continue to Chat" id="submit">
				</div>
			</form>

			<div class="direct-link">Not Yet Signed Up? <a href="index.php">Signup now</a></div>
		</section>
	</div>
 <!-- <script src="js/all.min.js"></script> -->
 <script src="js/passtoggle.js"></script>
 <script src="js/login.js"></script>
</body>
</html>