<?php
    $host="localhost";
    $dbname="carl2486";
    $username="carl2486";
//todo
    $pwd="password"
    $dbconn=new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $pwd);

    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
