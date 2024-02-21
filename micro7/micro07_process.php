<?php
// Check if username field is empty
if(empty($_POST['username'])){
    $event = 'missing';
    header("Location: micro07.php?error=Username field is empty!");
    exit();
}

// Check if password field is empty
if(empty($_POST['password'])){
    $event = 'missing';
    header("Location: micro07.php?error=Password field is empty!");
    exit();
}

// Check if username and password match
if($_POST['username'] == "pikachu" && $_POST['password'] == "pokemon"){
    // User is authenticated, redirect back to micro07.php with a secret message
    $event = 'successful';
    setcookie('login', 'true', time()+3600); // Set cookie for one hour
    header("Location: micro07.php?success=You are now logged in! Secret message: Gotta catch \'em all!");
    exit();
} else {
    // Username/password is incorrect, redirect back to micro07.php with an error message
    $event = 'unsuccessful';
    header("Location: micro07.php?error=Username and/or password is incorrect!");
    exit();
}

// Write event to file
$path = '/full/path/to/data/file.txt'; // Update with actual path to data file
$file = fopen($path, 'a'); // Open file in append mode
fwrite($file, $event . PHP_EOL); // Append event to file, with newline character
fclose($file); // Close file
?>