<?php
session_unset();

?>
<html>
    <head>
        <title>
            Please Log In
        </title>
    </head>

    <body>
        <?php include "header.php";?>
        <form method="post" action="movie1.php">
            <p>Enter you username:
                <input type="text" name="user">
            </p>
            <p>Enter your password:
                <input type="password" name="pass">
            </p>
            <p>
                <input type="submit" name="Submit" value="Submit">
            </p>
        </form>
    </body>
</html>