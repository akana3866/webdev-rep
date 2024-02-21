<!DOCTYPE html>
<html>
<head>
	<title>Micro 07</title>
</head>
<body>
	<?php 
		// Display error message if there is one
		if(isset($_GET['error'])){
			echo "<p style='color:red;'>".$_GET['error']."</p>";
		}
	?>
	<?php
		// Check if login cookie is set
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true'){
		    echo "<p>You are logged in!</p>";
		    exit(); // Hide login form if user is already logged in
		}
	?>
	<form action="micro06_process.php" method="POST">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
