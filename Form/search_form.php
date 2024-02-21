<!DOCTYPE html>
<html>
<head>
  <title>Movie Database</title>
        <style>

        </style>
  <meta charset="UTF-8">
  <title>Search Movies</title>
</head>
<body>
  <h1>My Movie Database: Search</h1>
        <?php
            include('header.php');
        ?>
  <form method="post" action="search.php">
    <label for="title">Movie Title:</label>
    <input type="text" id="title" name="title">
    <br><br>
    <input type="submit" value="Search">
  </form>
</body>
</html>
