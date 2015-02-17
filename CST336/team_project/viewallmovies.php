<?php
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
        323
        +
                FROM movie_table
                ORDER BY rating ASC";

        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }
    function getMovieNames(){
        global $dbconn;

		$sql = "SELECT rating, movie_category, release_date, movie_title
				FROM movie_table
				ORDER BY movie_title";

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
?>
<!DOCTYPE html>
<html>

<head>
<style>
table {
		margin: 0 auto;
		border-collapse: collapse;
		border: solid red 4px;
		padding: 10px;
		font-size: 15px;
}
td {
		padding: 20px;
		border: solid red 4px;
		text-align: center;
}
#header {
	border-bottom:solid 2px #f02323;
    text-align:center;
    padding:5px;
    height: 60px;
}
#nav {
    line-height:30px;
    height:1000px;
    width:220px;
    float:left;
    padding:5px;
    border-right: thin solid pink;
}
#section {
    width:1150px;
    float:left;
    padding:20px;
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;
}
div.logo {
    float: left;
    display: block;
    padding-left: 20px;
    padding-top: 10px
}
#logo {
	width:150px;
	float: left;
}
h2 {
	text-align:center;
}
#welcome {
	font-size: 36px;
	color: red;
	padding-right: 100px;
	padding-top:7px;

}
input.searchbar {
    margin: 0;
    padding: 5px 15px;
    font-size: 14px;
    border: 1px solid #f02323;
    border-right: 0px;
    border-top-left-radius: 5px 5px;
    border-bottom-left-radius: 5px 5px;
}

input.searchButton {
    margin: 0;
    padding: 5px 15px;
    font-size: 14px;
    outline: none;
    cursor: pointer;
    text-decoration: none;
    color: #fff;
    border: #f02323;
    background-color: #f02323;
    border-top-right-radius: 5px 5px;
    border-bottom-right-radius: 5px 5px;
}
input.searchButton:hover{
    background-color: #F46060;
}
div.search {

    padding-right: 20px;
    line-height: 1.2;
    float: right;
    display: inline;
    width: 70%;
    min-width:500px;
    text-align: right
}
</style>
</head>

<body>

<div id="header">
	<div id = "logo">
	 <a class="logo" href="http://hosting.otterlabs.org/powellphillipl/CST336/Group%20Project/new_file.php">
                    <img src="images/test2.png" width="150px" height="48px" >
                </a>
                </div>
     <div id = "welcome">
Welcome To The Crimson Cube Website
</div>
</div>

<div id="nav">
Sign In<br>
<a href = "http://hosting.otterlabs.org/powellphillipl/CST336/Group%20Project/viewallMovies.php">View All Movies</a><br>View All Movies<br>
Return A Movie<br>
Manage My Account<br>
Sign Out<br>
<a href = "http://hosting.otterlabs.org/powellphillipl/CST336/Group%20Project/signup.php">Sign Up Today</a><br>
Search All Movies
                <div id="searchwrapper">
                    <form class="searchForm" >
                        <input name="searchBar" type="input" class="searchbar" maxlength="100" size="10">
                        <input type="submit" value="search" class="searchButton">
                        <span class="clear"></span>
                    </form>
                </div>

</div>

<div id="section">
<h2>View All Movies</h2>
<p>Here are all movies that are available to rent, please note, some movies may not be available since they have already been rented out.  If you would like to filter
	your search by genre, year released, or rating click any of the search filters below</p>
                	<?php
                	$rows = 30;
					$allmovies = getMovieNames();
                	echo "<table border = \"1\">";
                		echo "<tr>";
						?>
                			<td id = "title"><strong>Movie Title</strong></td>
                			<td id = "title"><strong>Release Date</strong></td>
                			<td id = "title"><strong>Movie Rating</strong></td>
                			<td id = "title"><strong>Category</strong></td>
							<td> </td>
						<?php
                		echo "</tr>";
						foreach ($allmovies as $movie) {
							echo "<tr>";
							echo "<td>";
								echo "<option value='" . $movie['movie_title'] . "' >" . $movie['movie_title']. "</option>";
							echo "</td>";
							echo "<td>";
								echo "<option value='" . $movie['movie_title'] . "' >" . $movie['release_date']. "</option>";
							echo "</td>";
							echo "<td>";
								echo "<option value='" . $movie['movie_title'] . "' >" . $movie['rating']. "</option>";
							echo "</td>";
							echo "<td>";
								echo "<option value='" . $movie['movie_title'] . "' >" . $movie['movie_category']. "</option>";
							echo "</td>";
							echo "<td>";
							?>
							<form action = "rentnow.php" method = "post">
							<input type = "hidden" name = "movieId" value = "<?=$movie['movie_title']?>">
							<input type = "submit" name = "update" value = "Rent Now">
							</form>
							<?php
				}
					echo "</table>";




				?>
</div>

<div id="footer">
Copyright © W3Schools.com
</div>

</body>
</html>
