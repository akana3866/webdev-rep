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
  <h1>My Movie Database: Result</h1>
        <?php
            include('header.php');
        ?>

        <?php
      // connect to the database
      $dbpath = getcwd() . '/database/movies.db';
      $db = new SQLite3($dbpath);

      // get the user's search query
      $title = $_POST['title'];

      // prepare the SQL query to search for movies with matching titles
      $stmt = $db->prepare('SELECT * FROM movies WHERE title LIKE :title');
      $stmt->bindValue(':title', "%$title%", SQLITE3_TEXT);

      // execute the query and fetch the results
      $results = $stmt->execute();

      // display the results in a table
      echo '<table>';
      echo '<tr><th>ID</th><th>Title</th><th>Year</th></tr>';
      while ($row = $results->fetchArray()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['title'] . '</td>';
        echo '<td>' . $row['year'] . '</td>';
        echo '</tr>';
      }
      echo '</table>';

      ?>
</body>
</html>
