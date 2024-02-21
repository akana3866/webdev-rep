<?php
	// Check if username field is empty
	if(empty($_POST['username'])){
		header("Location: micro06.php?error=Username field is empty!");
		exit();
	}

	// Check if password field is empty
	if(empty($_POST['password'])){
		header("Location: micro06.php?error=Password field is empty!");
		exit();
	}

	// Check if username and password match
	if($_POST['username'] == "pikachu" && $_POST['password'] == "pokemon"){
		// User is authenticated, redirect back to micro06.php with a secret message
		header("Location: micro06.php?success=You are now logged in! Secret message: Gotta catch 'em all!");
		exit();
	} else {
		// Username/password is incorrect, redirect back to micro06.php with an error message
		header("Location: micro06.php?error=Username and/or password is incorrect!");
		exit();
	}
?>
