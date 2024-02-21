<!doctype html>
<html>
    <head>
        <title>Movie Database</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                text-align: left;
                padding: 8px;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <h1>My Movie Database: View</h1>

        <?php
            include('header.php');
        ?>

        <!-- grab all movies from the database and display to the user -->
        <?php

            // connect to database
            $dbpath = getcwd() . '/database/movies.db';
            $db = new SQLite3($dbpath);

            // set up a SQL query to get all movies from the table
            $sql = "SELECT id, title, year FROM movies";
            $statement = $db->prepare($sql);
            $result = $statement->execute();

            // generate a table to display the movies
            echo "<table>";
            echo "<tr><th>ID</th><th>Title</th><th>Year</th><th>Action</th></tr>";
            while ($array = $result->fetchArray()) {
                echo "<tr><td>".$array['id']."</td><td>".$array['title']."</td><td>".$array['year']."</td><td><a href='delete.php?id=".$array['id']."'>Delete</a></td></tr>";
            }
            echo "</table>";

            $db->close();
            unset($db);

        ?>

    </body>
</html>
