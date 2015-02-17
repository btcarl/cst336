<?php



if (isset($_POST['username'])){
	require 'connection.php';
	$sql = "SELECT username
			FROM lab7_user
			WHERE username = :username";

	$stmt = $dbconn -> prepare($sql);
	$stmt -> execute(array(":username" => $_POST['username']));
	$record = $stmt->fetch();

	$output = array();

	if (empty($record))
	{
		//echo "{\"exists\":\"true\"}";
		$output["exists"] = "false";

	}
	else
		{
			//echo "Username already taken";
			$output["exists"] = "true";
		}

		echo json_encode($output);
}


?>
