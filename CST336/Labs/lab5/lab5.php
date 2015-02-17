<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<?php

    require 'connection.php';
    $SQL = "SELECT teamName, teamId
            FROM teams
            ORDER BY teamName ASC";

    $stmt = $dbconn -> prepare($SQL);
    $stmt -> execute();
    $teamNames = $stmt->fetchAll();

    function getStadiums(){
        global $dbconn, $stmt;

        $SQL = "SELECT stadiumName, stadiumId
                FROM stadiums
                ORDER BY stadiumName ASC";
         $stmt = $dbconn -> prepare($SQL);
    $stmt -> execute();
    return $stmt->fetchAll();
    }

    if(isset($_POST['delete'])){
        $SQL = "DELETE FROM stadiums
                WHERE stadiumId = :stadiumId";
        $stmt = $dbconn -> prepare($SQL);
        $stmt -> execute(array(":stadiumId"=>$_POST['stadiumId']));
        echo "Stadium Deleted!";
    }
    if(isset($_POST['addMatch'])){
        $SQL = "INSERT INTO matches
                (team1_id, team2_id, date, stadiumId, team1_score, team2_score)
                VALUES (:team1_id, :team2_id, :date,(
                    SELECT stadiumId
                    FROM teams
                    WHERE teams.teamId =:team1_id
                ),:team1_score, :team2_score)";
        $stmt = $dbconn -> prepare($SQL);
        $stmt -> execute( array(":team1_id"=>$_POST['team1Id'],
                                ":team2_id"=>$_POST['team2Id'],
                                ":date"=>$_POST['datebox'],
                                ":team1_score"=>$_POST['team1Score'],
                                ":team2_score"=>$_POST['team2Score']));
    }


?>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Brian Carlston - lab 5</title>
		<meta name="description" content="">
		<meta name="author" content="bcarlston">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <script>
            function confirmDelete(stadiumName) {
                var remove = confirm("Do you really want to delete " + stadiumName + "?");
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
        <link type="text/css" rel="stylesheet" href="style.css">

	</head>
    <body>
        <div class="main">
            <h2>&#8902 NFL Matches &#8902</h2>

            <div class="contents">
                <h3><?php echo "Welcome " . $_SESSION['name'];?></h3>
                <form method="post" action="logout.php" onsubmit="confirmLogout()">
                    <input type="submit" value="Logout" />
                </form>
                <br />
                <form method="post" name="matchForm">
                    Select Home Team:
                    <select name="team1Id">
                        <?php
                            foreach($teamNames as $team){
                                echo "<option value='" . $team['teamId'] ."'>" . $team['teamName'] . "</option>";
                            }
                        ?>
                    </select>
                    Score:<input type="number" name="team1Score" value="0" min="0" max="120">
                    <br/>

                    Select Away Team:
                    <select name="team2Id">
                        <?php
                            foreach($teamNames as $team){
                                echo "<option value='" . $team['teamId'] ."'>" . $team['teamName'] . "</option>";
                            }
                        ?>
                    </select>
                    Score:<input type="number" name="team2Score" value="0" min="0" max="120">
                    <br/>
                    Date: <input type="date" name="datebox" required>
                    <br/><br/>
                    <textarea name="description" rows="15" cols="60" placeholder="Enter match recap"></textarea><br/>
                    <input type="submit" name="addMatch">
                </form>
                <h3>
                    NFL Stadiums
                </h3>
                <table>
                <?php
                    $stadiums = getStadiums();
                    foreach($stadiums as $stadium){
                ?>
                        <tr>
                        <td>
                        <form action="updatestadiums.php" method="post" >
                            <span class="stadname"><?=$stadium['stadiumName']?></span>
                            <input type="hidden" value="<?=$stadium['stadiumId']?>" name="stadiumId">
                            <input type="submit" name="update" value="Update">
                        </form>

                        <form method="post" onsubmit="confirmDelete('<?=$stadium['stadiumName']?>')">
                            <input type="hidden" value="<?=$stadium['stadiumId']?>" name="stadiumId">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                        <br/>
                        </td>
                        </tr>
                <?php
                    }
                ?>
                </table>
            </div>
        </div>
    </body>
</html>
