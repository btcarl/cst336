<?php
    $host="localhost";
    $dbname="powe7914";
    $username="powe7914";
    $pwd="csitguys";

    try{
        $dbconn=new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $pwd);
    }
    catch(Exception $e){
        echo "Unable to connect to database";
        exit();
    }
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
