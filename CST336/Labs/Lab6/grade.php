<?php
	$grade = 0;

	if($_POST['ans1'] == "chickenImg"){
		$grade += 20;
	}
	if($_POST['ans2'] == "GATO"){
		$grade += 20;
	}
	if($_POST['ans3'] == "dog"){
		$grade += 20;
	}
	if($_POST['ans4'] == "bear"){
		$grade += 20;
	}
	if($_POST['ans5'] == "cow"){
		$grade += 20;
	}
	echo $grade;
?>
