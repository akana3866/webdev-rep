<!DOCTYPE html>
<html>
<head>
    <title>Quiz!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        #error {
            background-color: #f44336;
            color: white;
            padding: 10px;
            font-size: 24px;
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            margin-top: 20px;
        }
        form {
            width: 400px;
            margin: 0 auto;
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        select {
            margin: 10px;
            padding: 10px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #f2f2f2;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Quiz!</h1>

<?php
if ($_COOKIE['character']) {
    print "<div>You are " . $_COOKIE['character'] . "</div>";

    // Display the corresponding character image
    if ($_COOKIE['character'] == 'Homer') {
        print "<img src='images/Homer.png'>";
    } elseif ($_COOKIE['character'] == 'Marge') {
        print "<img src='images/Marge.png'>";
    } elseif ($_COOKIE['character'] == 'Lisa') {
        print "<img src='images/Lisa.png'>";
    } elseif ($_COOKIE['character'] == 'Bart') {
        print "<img src='images/Bart.png'>";
    }

    print "<a href=clear.php>Clear Results</a>";
} else {
    if ($_GET['error'] == 'forgot') {
        ?>
        <div id="error">You forgot a value!</div>
        <?php
    }
    ?>

    <form action="save.php" method="POST">
        Suppose you were assigned some work, when do you usually start it?
        <select name="assign" id="assign" required>
            <option value="">Select an option</option>
            <option value="0">The day its due</option>
            <option value="1">Few days before its due</option>
            <option value="2">The day it got assigned</option>
        </select><br><br>
        What animal describes you the most?
        <select name="pet" id="pet" required>
            <option value="">Select an option</option>
            <option value="x">A sloth</option>
            <option value="y">A dog</option>
            <option value="z">A dolphin</option>
        </select><br><br>
        Your parents are not home, what would you usually be doing?
        <select name="activity" id="activity" required>
            <option value="">Select an option</option>
            <option value="a">Tidy up the place.</option>
            <option value="b">Sleep or lounge around.</option>
            <option value="c">Throw a ragerrr!!!!</option>
            <option value="d">Try something new!</option>
        </select><br><br>
        <input type="submit">
    </form>

    <?php
}
?>

<p><a href="results.php">View aggregate results</a></p>

</body>
</html>
