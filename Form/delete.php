<?php

// get the ID from the URL query parameter
$id = $_GET['id'];

// connect to database
$dbpath = getcwd() . '/database/movies.db';
$db = new SQLite3($dbpath);

// set up a SQL query to delete the movie with the given ID
$sql = "DELETE FROM movies WHERE id=:id";
$statement = $db->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();

// close database connection
$db->close();

// redirect the user back to the main page
header("Location: index.php");
exit();

?>
