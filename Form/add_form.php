<!doctype html>
<html>
    <head>
        <title>Movie Database</title>
        <style>

        </style>
    </head>
    <body>
        <h1>My Movie Database: Add</h1>
        <?php
            include('header.php');
        ?>
        <form method="POST" action="add_save.php">
            Title: <input type="text" name="title"><br>
            Year: <input type="text" name="year"><br>
            <input type="submit" value="Add Movie">
        </form> 


    </body>

</html>