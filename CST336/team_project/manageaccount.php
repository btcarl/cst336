<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: signon.php");
    }
    require "connections.php";
    function getReleaseDate(){
        global $dbconn;
        $sql = "SELECT DISTINCT release_date
                FROM movie_table
                ORDER BY release_date DESC";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }
    function getRatings(){
        global $dbconn;
        $sql = "SELECT DISTINCT rating
                FROM movie_table
                ORDER BY rating ASC";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }
    function getGenres(){
        global $dbconn;
        $sql = "SELECT movie_category,
                COUNT(*) AS amount
                FROM movie_table
                GROUP BY movie_category
                ORDER BY amount DESC";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }
    function getMovieNames(){
        global $dbconn;

		$sql = "SELECT rating, movie_category, release_date, movie_title, movie_id
				FROM movie_table
				ORDER BY movie_title";

        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
	}
    function getLocations(){
        global $dbconn;
        $sql = "SELECT name, location_id
                FROM locations
                ORDER BY name";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }
    $searchResults = "";
    if(isset($_GET['searchBar'])){
        $searchinput = $_GET['searchBar'];
        $sql = "SELECT *
                FROM movie_table
                WHERE movie_title
                LIKE :search";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute(array(':search'=>('%'. $searchinput . '%')));
        $searchResults = $stmt->fetchAll();
    }
    $category = "";
    if(isset($_GET['genre'])){
        $sql = "SELECT *
                FROM movie_table
                WHERE movie_category=:movie_category
                ORDER BY movie_title";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute(array(':movie_category'=>$_GET['genre']));
        $category = $stmt->fetchAll();

    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<style>
			h1 {
				text-align: center;
			}
			.menuitem {
				text-align: center;
			}
		</style>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Crimson Cube</title>
		<meta name="description" content="">
		<meta name="author" content="csitguys">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link type="text/css" rel="stylesheet" href="style.css">
        <script>
            function confirmRental(movie_title, location) {
                var remove = confirm("Do you really want to rent " + movie_title + "From" + location + "?");
                if (!remove) {
                    event.preventDefault();
                }
            }
            function confirmLogout(event) {
                var logout = confirm("Do you really want to log out?");
                if (!logout) {
                    event.preventDefault();
                }
            }
        </script>
	</head>
    <body>
        <?php
            $dates = getReleaseDate();
            $ratings = getRatings();
            $genres = getGenres();
            $locations = getLocations();
        ?>
        <div id="header">
            <div class="logo">
                <a class="logo" href="index.php">
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
                <div id="links">
			<?php
			echo "<h4>Welcome " . $_SESSION['fname'] . " ". substr($_SESSION['lname'], 0,1) ."</h4>"
			?>
			<a href="signon.php">Sign In</a><br>
			<a href="returnmovie.php">Return A Movie</a><br>
			<a href="manageaccount.php">Manage Account</a><br>
			<a href="transactions.php">Order History</a><br>
			<form method="post" action="signout.php" onsubmit="confirmLogout()">
				<input type="submit" value="Sign Out" />
			</form>
		</div>
                <ul>
                <?php
                    foreach($genres as $genre){
                        echo '<li><a href="index.php?genre='.$genre['movie_category'].'">' . $genre['movie_category'] . ' (' . $genre['amount'] . ')</a></li>';
                    }
                ?>
                </ul>
                <span class="clear"></span>
            </div>
            <div id="mainpage">
                <h1>Manage My Account</h1>
                <p>Welcome to the manage my account page.  From this page you will be able to make any changes needed to your account.  Below
                	is a menu of the options you have, please click "change password" to change the password for your account, or click "View All Transactions"
                	to view all of the transactions made to this account.</p>
                 <span class="menuItem"><a href = "manageaccount.php"?>Main Menu</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
 			  	 <span class="menuItem"><a href="changepassword.php">Change Password</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
 			  	  <span class="menuItem"><a href="useractivity.php">User Activity</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  				 <span class="menuItem"><a href = "transactions.php">View All Transactions</a></span>
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
