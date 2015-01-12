<html>
<head>
<title>Find My Favorite movie!</title>
<?php
    session_start();
    $_SESSION['username'] = $_POST['user'];
    $_SESSION['userpass'] = $_POST['pass'];
    $_SESSION['authuser'] = 0;
//check username and password information
    if (($_SESSION['username'] == 'Joe') and ($_SESSION['userpass']==12345))
    {
        $_SESSION['authuser'] = 1;
    }else
    {
        echo " Sorry but you dont have permission";
        exit();
    }
?>
</head>

<body>
    <?php include "header.php";?>
    <?php
        $myfavmovie = urlencode("The Life of Brian");
        echo "<a href='reading.php?favmovie=$myfavmovie'>";
        echo "Click here to see more about my favorite movie";
		echo "</a>";
        echo "<br>";
        echo "<a href='reading.php?movienum=5'>";
        echo "Click here to see my top 5 movies";
        echo "</a>";
        echo "<br>";
        echo "<a href='reading.php?movienum=10'>";
        echo "Click here to see my top 10 movies";
        echo "</a>";
    ?>
</body>
</html>