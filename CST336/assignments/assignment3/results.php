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

            if(isset($_POST['fname'])){
                $firstname =  $_POST['fname'];
            }
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
            $men =array (newPerson('frank', 'Lampard', 'male', 'brown', 'blue', 'thursday', 'opposite'));
            array_push($men, newPerson('Thomas', 'McGilvary', 'male', 'red','green','monday','same'));
            array_push($men, newPerson('Clark', 'Kent', 'male', 'black','gray','sunday','middle'));
            array_push($men, newPerson('Ishaan', 'Chopra', 'male', 'black','black','thursday','opposite'));
            array_push($men, newPerson('Juan', 'Ramirez', 'male', 'brown','brown','thursday','opposite'));
            array_push($men, newPerson('Dante', 'Washington', 'male', 'black','black','monday','same'));
            array_push($men, newPerson('Anders', 'Lindegaard', 'male', 'blonde','blue','sunday','middle'));

            print_r($men);
        ?>
        <div id="header">
            <h1>JIBE.com</h1>
        </div>
        <div id="main">
            <h2>
                JIBE.com
            </h2>
            <h3> Welcome to Jibe <?php echo $firstname ?>. Here are the matches that we have found for you:</h3>

            <div id="footer">
                <p><sup>*</sup>Ideal matches might possibly be made at complete random. Jibe is not responsible for the veracity of matches and is one hundred percent unaccountable for matches that result in confusion. </p>
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
