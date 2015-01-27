<!DOCTYPE html>
<?php
    require 'connection.php';
    $SQL = "SELECT teamName, stadiumId
            FROM teams
            ORDER BY teamName ASC";

    $stmt = $dbconn -> prepare($SQL);
    $stmt -> execute();
    $teamNames = $stmt->fetchAll();

    if(isset($_GET['stadiumId'])){
        $stadiumId = $_GET['stadiumId'];
        $SQL = "SELECT *
                FROM stadiums
                WHERE stadiumId = :stadiumId";
        $stmt = $dbconn -> prepare($SQL);
        $stmt -> execute(array(':stadiumId'=>$stadiumId));
        $stadiumInfo = $stmt->fetch();
    }
    function topfive(){
        global $dbconn, $stmt;
        $SQL = "SELECT state, SUM(capacity) combinedCapacity
                FROM stadiums
                GROUP BY state
                ORDER BY combinedCapacity DESC
                LIMIT 5";
        $stmt = $dbconn -> prepare($SQL);
        $stmt -> execute();
        return $stmt->fetchAll();

    }
    function homestadiums(){
        global $dbconn, $stmt;
        $SQL = "SELECT teams.teamName, stadiums.stadiumName, stadiums.state
                FROM teams, stadiums
                WHERE teams.stadiumId = stadiums.stadiumId
                ORDER BY teams.teamName ASC";
        $stmt = $dbconn -> prepare($SQL);
        $stmt -> execute();
        return $stmt->fetchAll();
    }
?>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Brian Carlston - lab 4</title>
		<meta name="description" content="">
		<meta name="author" content="bcarlston">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link type="text/css" rel="stylesheet" href="style.css">
	</head>
    <body>
        <div class="main">
            <h2>&#8902 NFL Stadiums &#8902</h2>
            <div class="contents">
                <form>
                    <select name="stadiumId">
                        <option value = "-1">- Select Team</option>
                        <?php
                            foreach($teamNames as $team){
                                echo "<option value='" . $team['stadiumId'] ."'>" . $team['teamName'] . "</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" value="Get Stadium Info!"/>
                </form><br/>
                <?php
                    if(isset($_GET['stadiumId']) and !empty($stadiumInfo)){
                        echo $stadiumInfo['stadiumName']. "<br />";
                        echo $stadiumInfo['street']. "<br />";
                        echo $stadiumInfo['city']. "<br />";
                    }
                ?>
                <h3>Top 5 states with the largest combined number of seats in NFL stadiums</h3>
                <?php
                    $records = topfive();
                    foreach($records as $record){
                        echo $record['state']. " - " . $record['combinedCapacity'] . "<br />";
                    }
                ?>
                <h3>List of all teams and their home stadiums</h3>
                <?php
                    $records = homestadiums();
                   //print_r($records);
                    foreach($records as $record){
                        echo $record['teamName']. " - " . $record['stadiumName'] . " - " . $record['state'] . "<br />";
                   }
                ?>
            </div>
        </div>
    </body>
</html>
