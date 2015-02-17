<?php
    require "connections.php";


?>
<!DOCTYPE html>
<html>

<head>
<style>

</head>

<body>

<div id="header">
	<div id = "logo">
	 <a class="logo" href="http://hosting.otterlabs.org/powellphillipl/CST336/Group%20Project/new_file.php">
                    <img src="test2.png" width="150px" height="48px" >
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
<h2>Create A New Account</h2>
<p>Thank you for your interest in the Crimson Cube, please enter a little bit of information so you can begin renting movies!</p>
<form action = "finishaccount.php" method = "POST">
			Enter Your First Name:  <input type = "text" name = "words[]"><br/><br/>
			Enter Your Last Name:  <input type = "text" name = "words[]"><br/><br/>
			Username:  <input type = "text" name = "words[]"><br/><br/>
			Password:  <input type = "text" name = "words[]"><br/><br/>
			<input type = "submit" value = "Create My Account!">
		</form>

</div>

<div id="footer">
Copyright © W3Schools.com
</div>

</body>
</html>
