<?php
    require "connections.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
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
                <form class="filterForm">
                    <select name="location">
                        <option value="location_id">location A</option>
                        <option value="location_id">location B</option>
                        <option value="location_id">location C</option>
                    </select>
                    <select name="rating">
                        <option value="rating">G</option>
                        <option value="rating">PG</option>
                        <option value="rating">PG-13</option>
                    </select>
                    <select name="year">
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                    </select>
                </form>
                <form class="searchForm" >
                    <input name="searchBar" type="input" class="searchbar" maxlength="100" size="21">
                    <input type="submit" value="search" class="searchButton">
                    <span class="clear"></span>
                </form>

            </div>
        </div>

    </body>
</html>
