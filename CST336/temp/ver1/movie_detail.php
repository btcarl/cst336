<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: signon.php");
    }
    require "connections.php";
    function get_description(){
        global $dbconn;
        if(isset($_GET['movie_id'])){
            $sql = "SELECT movie_description, movie_title
                    FROM movie_table
                    WHERE movie_id = :movie_id";
            $stmt = $dbconn -> prepare($sql);
            $stmt -> execute(array(':movie_id'=>$_GET['movie_id']));
            return $stmt->fetchAll();
        }

    }

    function getLocations(){
        global $dbconn;
        $sql = "SELECT locations.location_id, name, MIN( inventory_id )
                FROM locations
                INNER JOIN inventory ON locations.location_id = inventory.location_id
                WHERE inventory.movie_id =:movie_id
                AND inventory_id NOT IN (
                    SELECT transactions.inventory_id
                    FROM transactions
                    WHERE returned =0
                )
                GROUP BY name";

        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute(array(':movie_id'=>$_GET['movie_id']));
        return $stmt->fetchAll();
    }
    $movie_details= get_description();
    $locations = getLocations();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>
		      <?php
                echo $movie_details[0]['movie_title'];
            ?>
		</title>
		<meta name="description" content="">
		<meta name="author" content="csitguys">
        <script>
            function confirmRental(movie_title) {
                var remove = confirm("Do you really want to rent " + movie_title +"?");
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
		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link type="text/css" rel="stylesheet" href="style.css">

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
            <?php
                $movie_title = $movie_details[0]['movie_title'];
            ?>
            <div id="mainpage" class="description">
                <h2><?php echo $movie_title;?></h2>
                <p class="description">
                    <?php
                        echo $movie_details[0]['movie_description'];
                    ?>
                </p>
                <?php
                    if(!empty($locations)){
                  ?>

                <form method="post" action="rent.php" onsubmit="confirmRental('<?=$movie_title ?>')">
                    <select name="location">
                        <?php



                            foreach($locations as $location){
                                echo '<option value="'.$location[2].'">' . $location['name'] . '</option>';
                            }
                        ?>
                    </select>

				    <input type = "submit" value = "Rent Now">

				</form>
                <?php
                    }else{
                        echo "<p>Movie Not in stock. </p>";
                    }
                ?>
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
