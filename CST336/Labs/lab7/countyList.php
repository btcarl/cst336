<?php

require "connection.php";
// Setting Errorhandling to Exception

	 $sql = "SELECT DISTINCT(county) FROM zip_code " .
			" WHERE state = :state AND county !='' ORDER BY county";
	 $stmt = $dbconn->prepare($sql);
	 $stmt->execute( array (":state"=>$_GET['state']));
	 $results = $stmt->fetchAll();

	 echo "{ \"counties\": [ ";
	 foreach ($results as $record){
		 echo "{\"county\":" . "\"" . $record['county'] . "\"},";
	 }
	 echo "{\"county\":" . "\"\"}";
	 echo "] }";

?>
