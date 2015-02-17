<?
    require 'connection.php';//change this to your own database authentication file

    function getStadium($stadiumId){
        global $dbconn;

        $sql = "SELECT *
                FROM stadiums
                WHERE stadiumId = :stadiumId";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute(array(":stadiumId"=>$stadiumId));
        return $stmt->fetch();
    }

    if (isset($_POST['save'])) { //checks whether we're coming from "save data" form

        $sql = "UPDATE stadiums
                SET stadiumName = :stadiumName,
                street = :street,
                city = :city
                WHERE stadiumId = :stadiumId";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute(array(":stadiumName"=>$_POST['stadiumName'],
                                ":street"=>$_POST['street'],
                                ":city"=>$_POST['city'],
                                ":stadiumId"=>$_POST['stadiumId']
                        ));

        echo "RECORD UPDATED!! <br> <br>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
    Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>updateStadium</title>
    <meta name="description" content="">
    <meta name="author" content="lara4594">

    <meta name="viewport" content="width=device-width; initial-scale=1.0">

    <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
    <div>

    <?
    if (isset($_POST['stadiumId'])) {
        $stadiumInfo = getStadium($_POST['stadiumId']); ?>

        <form method="post">
        Stadium Name: <input type="text" name="stadiumName" value="<?=$stadiumInfo['stadiumName']?>" /><br />
        Street: <input type="text" name="street" value="<?=$stadiumInfo['street']?>" /><br />
        City: <input type="text" name="city" value="<?=$stadiumInfo['city']?>" /><br />
        <input type="hidden" name="stadiumId" value="<?=$stadiumInfo['stadiumId']?>">
        <input type="submit" name="save" value="Save">
        </form>

    <? }

    ?>
    <br /><br />
    <a href="lab5.php"> Go back to main page </a>

    </div>
</body>
</html>
