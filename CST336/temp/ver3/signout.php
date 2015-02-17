<?php
session_start();
require 'connections.php';

$sql = "SELECT  MAX(session_id)
        FROM user_activity
        WHERE user_id = :user_id";

        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute(array(":user_id" =>$_SESSION["user_id"]));
        $record = $stmt -> fetch();
        print_r($record);
$sql = "UPDATE user_activity SET logout_time = CURTIME() WHERE session_id =:session_id";
   $stmt = $dbconn -> prepare($sql);
     $stmt -> execute(array(":session_id" =>$record[0]));


session_destroy();

header("Location: signon.php");
?>
