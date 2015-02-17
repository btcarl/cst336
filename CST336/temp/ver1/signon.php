<?php

    session_start();
    if (isset($_POST['username'])){
        require 'connections.php';

        $sql = "SELECT *
                FROM users
                WHERE email = :username
                AND password = :password";

        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute(array(":username" => $_POST['username'], ":password" => hash("sha1", $_POST['password'])));

        $record = $stmt -> fetch();

        if (empty($record)){
            echo "Wrong username/password!";
        } else {
            $_SESSION['username'] = $record['email'];
            $_SESSION['fname'] = $record['first_name'];
            $_SESSION['lname'] = $record['last_name'];
            $_SESSION['user_id'] = $record['user_id'];
            header("Location: index.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Sign in</title>
        <meta name="description" content="">
        <meta name="author" content="csitguys">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link type="text/css" rel="stylesheet" href="style.css">

        </style>

    </head>

    <body>

        <div id="header">
            <div class="logo">
                <a class="logo" href="./">
                    <img src="images/test2.png" width="150px" height="48px" >
                </a>
                <span class="clear"></span>
            </div>
            <div class="search">
                <div id="filterwrapper">
                    <form class="filterForm">
                        <select name="location" class="filterinput left" >
                            <option class="placeholder" value="" disabled selected>Location</option>
                            <?php
                            foreach($locations as $location){
                                echo '<option value="'. $location['location_id'] . '">' . $location['name'] . '</option>';
                            }
                            ?>
                        </select>
                        <select name="rating" class="filterinput">
                            <option class="placeholder" value="" disabled selected>rating</option>
                            <?php
                                foreach($ratings as $rating){
                                    echo '<option value="' . $rating['rating'] . '">' . $rating['rating'] . '</option>';
                                }
                            ?>
                        </select>
                        <select name="year" class="filterinput right">
                            <option class="placeholder" value="" disabled selected>Date</option>
                            <?php
                                foreach($dates as $date){
                                    echo '<option value="' . $date['release_date'] . '">' . $date['release_date'] . '</option>';
                                }
                            ?>
                        </select>
                        <br />
                        <input class="searchButton" type="reset" value="Clear Filters" style="width:50%; border-top-right-radius: 0px 0px;
    border-bottom-right-radius: 5px 5px; border-right: thin solid #fff ">
                        <input class="searchButton" type="submit" value="Filter" style="width:50%; border-bottom-left-radius: 5px 5px; border-top-right-radius: 0 0 ; border-bottom-right-radius: 0 0;">
                    </form>
                </div>
                <div id="searchwrapper">
                    <form class="searchForm" >
                        <input name="searchBar" type="input" class="searchbar" maxlength="100" size="21">
                        <input type="submit" value="search" class="searchButton">
                        <span class="clear"></span>
                    </form>
                </div>

            </div>
            <span class="clear"></span>
        </div>

        <div id=main>
            <div id="navbar">
                <ul>
                <?php
                    //foreach($genres as $genre){
                    //    echo '<li><a href="index.php?genre='.$genre['movie_category'].'">' . $genre['movie_category'] . ' (' . $genre['amount'] . ')</a></li>';
                   // }
                ?>
                </ul>
                <span class="clear"></span>
            </div>
            <div id="mainpage" class="description">


            <h2>Login</h2>
                <div = class="contents">
                    <form method="post">
                        Username: <input type="text" name="username" /><br />
                        <p></p>
                        Password: <input type="password" name="password" /><br />
                        <p></p>
                        <input type="submit" value="Login" />
                        <p></p>
                    </form>
                    <a href="signup.php">Create an account</a>
                    <p>
                    Username: a@b.com<br />
                    Password: 1234
                    </p>
                </div>
            </div>
        </div>

        <div id="footer">
            <div id="copyright_wrapper">
                <p>site design / logo © 2015  CSIT GUYS</p>
                <span class="clear"></span>
            </div>

            <div id="footer_img_wrapper">
                <img src="images/inverse.png" height="30px" width="100px">
                <span class="clear"></span>
            </div>
        </div>



    </body>
</html>
