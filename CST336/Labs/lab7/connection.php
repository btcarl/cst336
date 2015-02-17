<?php
    $host="localhost";
    $dbname="carl2486";
    $username="carl2486";
    $pwd="carldb";

    try{
        $dbconn=new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $pwd);
    }
    catch(Exception $e){
        echo "Unable to connect to database";
        exit();
    }
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
