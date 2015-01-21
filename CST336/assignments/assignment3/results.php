<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Assignment 3</title>
		<meta name="description" content="">
		<meta name="author" content="bcarlston">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link type="text/css" rel="stylesheet" href="style.css">
	</head>

	<body>
        <?php

            //initialize variables
            $firstName = $lastName = $gender = $hcolor= $ecolor = $favday = $preference = "";

            if(isset($_SESSION['fname'])){
                $firstName =  $_SESSION['fname'];
                echo $firstName;
            }
            if(isset($_SESSION['gender'])){
                $gender =  $_SESSION['gender'];
            }
            if(isset($_SESSION['prefer'])){
                $preference =  $_SESSION['prefer'];
            }
            if(isset($_SESSION['lname'])){
                $lastName =  $_SESSION['lname'];
            }
            if(isset($_SESSION['haircolor'])){
                $hcolor =  $_SESSION['haircolor'];
            }
            if(isset($_SESSION['eyecolor'])){
                $ecolor =  $_SESSION['eyecolor'];
            }
            if(isset($_SESSION['days'])){
                $favday =  $_SESSION['days'];
            }
            if(($firstName != "") and ($lastName != "" ) and ($gender !="") and ($hcolor!= "") and ($ecolor!="") and ($favday!="") and ($preference!="")){
                $customer = newperson($firstName, $lastName, $gender, $hcolor, $ecolor, $favday, $preference);

            }
//creates a new person array
            function newPerson($fname, $lname, $gender, $hcolor, $ecolor, $favday, $preference){
                $person = array('fname'=> $fname,
                                'lname' => $lname,
                                'gender'=>$gender,
                                'hcolor'=>$hcolor,
                                'ecolor'=>$ecolor,
                                'favday'=>$favday,
                                'preference'=>$preference
                               );
                return $person;
            }
//initialize men data
            $men =array (newPerson('Frank', 'Lampard', 'male', 'brown', 'blue', 'thursday', 'opposite'));
            array_push($men, newPerson('Thomas', 'McGilvary', 'male', 'red','green','monday','same'));
            array_push($men, newPerson('Clark', 'Kent', 'male', 'black','gray','sunday','middle'));
            array_push($men, newPerson('Ishaan', 'Chopra', 'male', 'black','black','thursday','opposite'));
            array_push($men, newPerson('Juan', 'Ramirez', 'male', 'brown','brown','thursday','opposite'));
            array_push($men, newPerson('Dante', 'Washington', 'male', 'black','black','monday','same'));
            array_push($men, newPerson('Anders', 'Lindegaard', 'male', 'blonde','blue','sunday','middle'));

//initialize women data
            $women = array(newPerson('Wendy', 'Thomas', 'female', 'brown', 'brown', 'sunday', 'same'));
            array_push($women, newPerson('Sally', 'McGilvary', 'female', 'red','green','monday','same'));
            array_push($women, newPerson('Mary', 'Kent', 'female', 'black','gray','sunday','middle'));
            array_push($women, newPerson('Jean', 'Chopra', 'female', 'black','black','thursday','opposite'));
            array_push($women, newPerson('Cynthia', 'Ramirez', 'female', 'brown','brown','thursday','opposite'));
            array_push($women, newPerson('Anna', 'Washington', 'female', 'black','black','monday','same'));
            array_push($women, newPerson('Frea', 'Lindegaard', 'female', 'blonde','blue','sunday','middle'));

            $match;
            $first_names = array();
            $max=$min=$maxindex=$minindex=0;
            if($gender=='female'){
                $temp = array_diff($men[0],$customer);
                $max=$min= count($temp);
                $arrlength = count($men);
                for($x = 0; $x < $arrlength; $x++) {
                    array_push($first_names, $men[$x]["fname"]);
                    $temp = array_diff($men[$x],$customer);
                    if(count($temp)<$min){
                        $minindex= $x;
                        $min = count($temp);
                    }
                    if(count($temp)>$max){
                        $maxindex= $x;
                        $max = count($temp);
                    }
                }
                if($preference =="opposite"){
                    $match = $men[$maxindex];
                }
                elseif($preference=="same"){
                    $match = $men[$minindex];
                }else{
                    $random_key = array_rand($men);
                    $match = $men[$random_key];
                }
            }
            else{
                $temp = array_diff($women[0],$customer);
                $max=$min= count($temp);
                $arrlength = count($women);
                for($x = 0; $x < $arrlength; $x++) {
                    array_push($first_names, $women[$x]["fname"]);
                    $temp = array_diff($women[$x],$customer);
                    if(count($temp)<$min){
                        $minindex= $x;
                        $min = count($temp);
                    }
                    if(count($temp)>$max){
                        $maxindex= $x;
                        $max = count($temp);
                    }
                }
                if($preference =="opposite"){
                    $match = $women[$maxindex];
                }
                elseif($preference=="same"){
                    $match = $women[$minindex];
                }else{
                    $random_key = array_rand($women);
                    $match = $women[$random_key];
                }
            }

            sort($first_names);

        ?>
        <div id="header">
            <h1>JIBE.com</h1>
        </div>
        <div id="main">
            <h2>
                JIBE.com
            </h2>
            <h3> Welcome to Jibe <?php echo $firstName ?>. Here are the matches that we have found for you:</h3>
            <?php

                echo "<h4>Your ideal<sup>&#43</sup> match: " . $match['fname'] . " " . $match['lname'] . "</h4>";
                echo "<div id=\"aboutMatchWrapper\"><strong>About ". $match['fname'] . "</strong><br>";
                echo "Eye Color: " . $match['ecolor'] . "<br>";
                echo "Hair Color: " . $match['hcolor'] . "<br>";
                echo "Favorite Day of the Week: " . $match['favday'] . "<br><br><br>";
                echo "</div>";


                $arrlength = count($first_names);
                echo "<span> Potential matches: ";
                for($x = 0; $x < $arrlength; $x++) {
                    echo $first_names[$x];
                    echo ",&nbsp";
                }
                echo "</span>";
            ?>
            <div id="footer">
                <p><sup>*</sup>Ideal matches might possibly be made at complete random. Jibe is not responsible for the veracity of matches and is one hundred percent unaccountable for matches that result in confusion. </p>
                <p><sup>&#43</sup>Your ideal match might not be ideally matched for you.</p>
            </div>
        </div>
        <div id="navWrapper">
            <h2 id="linkheader">CST 336 Links</h2>
            <ul>
                <li>
                  <span class="sections">Labs</span>
                  <ul>
                    <li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/lab1/lab1.html">Lab 1</a></li>
                    <li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/lab2/index.php">Lab 2</a></li>
                    <li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/lab3/index.php">Lab 3</a></li>
                    <li class="links">Lab 4</li>
                    <li class="links">Lab 5</li>
                  </ul>
                </li>
                <li >
                  <span class="sections">Assignments</span>
                  <ul>
                      <li class="links"><a  href="http://hosting.otterlabs.org/carlstonbriant/CST336/assignments/assignment1/homepage.html">Assignment 1</a></li>
                      <li class="links"><a  href="http://hosting.otterlabs.org/carlstonbriant/CST336/assignments/assignment2/index.php">Assignment 2</a></li>
                      <li class="links"><a style="color:#e91e63" href="http://hosting.otterlabs.org/carlstonbriant/CST336/assignments/assignment3/index.php">Assignment 3</a></li>
                  </ul>
                </li>
                <li class="sections">Team Assignment</li>
                <li class="sections"><a href="http://btc-csit.blogspot.com/">Learning Journal</a></li>
            </ul>
        </div>

    </body>
</html>
