<?php
    session_start();
    require "connections.php";
    if(isset($_POST['location'])){
        $price =getPrice($_POST['location']);
        //create transaction
        $sql = "INSERT INTO transactions
                (customer_id, amount, transaction_id, inventory_id, dates, returned)
                VALUES
                (:customer_id, :price, NULL, :inventory_id, now(), 0)";
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute (array(":customer_id" => $_SESSION['user_id'],
                                ":price" => $price['price'],
                                ":inventory_id" => $_POST['location']));

       /* $stmt -> execute (array(":customer_id" => $_SESSION['customer_id'],
                                ":price" => $_POST['price'],
                                ":inventory_id" => $_POST['location'],
                                ":date" => $_POST['date']));*/
               // $customer_id = $dbConn -> lastInsertId();


        //update inventory

    }
    function getPrice($invId){
        global $dbconn;
        $sql = "SELECT price
                FROM movie_table
                INNER JOIN inventory
                ON movie_table.movie_id = inventory.movie_id
                WHERE inventory_id =" .$invId;
        $stmt = $dbconn -> prepare($sql);
        $stmt -> execute();
        return  $stmt ->fetch();
    }
    header("Location: index.php");

?>
