<?php session_start();
   // phpinfo();
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
//
// define variables and set to empty values
$fnameErr = $lnameErr = $preferErr = $favdayErr = "";
$fname = $lname = $prefer = $comment = $website = "";
$valid = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fname"])) {
        $fnameErr = "First name is required";
        $valid = false;
   } else {
     $firstname = test_input($_POST["fname"]);
   }

   if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
       $valid = false;
   }else{
        $lastname =  test_input($_POST["lname"]);
   }



   if (empty($_POST["days"])) {
     $favdayErr = "You must answser this question";
       $valid = false;
   }

   if (empty($_POST["prefer"])) {
     $preferErr = "You must answser this question";
       $valid = false;
   }
    if($valid){
        $_SESSION["fname"] = $firstname;
        $_SESSION["lname"] = $_POST["lname"];
        $_SESSION["gender"] = $_POST["gender"];
        $_SESSION["haircolor"] = $_POST["haircolor"];
        $_SESSION["eyecolor"] = $_POST["eyecolor"];
        $_SESSION["prefer"] = $_POST["prefer"];
        $_SESSION["days"] = $_POST["days"];
        header('Location: http://hosting.otterlabs.org/carlstonbriant/CST336/assignments/assignment3/results.php');
    }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
        <div id="header">
            <h1>JIBE.com</h1>
        </div>
        <div id="main">
            <h2>
                JIBE.com
            </h2>
            <h3>
                Find the one you jibe with today. Our algorithms will pair you up with your ideal<sup>*</sup> match.

            </h3>
            <h4>To get started tell us about yourself.</h4>
            <form name="profile" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <ul>
                    <li class="quest">First Name: <input type="text" name="fname" value="<?php $firstname ?>"> <span class="error"><?php echo $fnameErr ?></span></li>
                    <li class="quest">Last Name:  <input type="text" name="lname" value="<?php $lastname ?>"> <span class="error"><?php echo $lnameErr ?></span></li>
                    <li class="quest">Gender:
                        <input type="radio" name="gender" value="male" checked>Male
                        <input type="radio" name="gender" value="female">Female
                    </li >
                    <li class="quest">Select Hair Color:
                        <select name="haircolor" size="1">
                            <option value="red">Red</option>
                            <option value="bown">Brown</option>
                            <option value="black">Black</option>
                            <option value="blonde">Blonde</option>
                            <option value="gray">Gray</option>
                            <option value="other">Other</option>
                        </select>
                    </li>
                    <li  class="quest">Select Eye Color:
                        <select name="eyecolor" size="1">
                            <option value="green">Green</option>
                            <option value="brown">Brown</option>
                            <option value="blue">Blue</option>
                            <option value="gray">Gray</option>
                        </select>
                    </li>



                </ul>
                <h4>Answer the following multiple choice questions to determine your JIBE<sup>&copy;</sup>.</h4>
                <ul>
                    <li class="quest">Which day do you prefer?
                        <li class="quest"><input type="radio" name="days" value="monday" checked>Monday </li>
                        <li class="quest"><input type="radio" name="days" value="thursday">Thursday</li>
                        <li class="quest"><input type="radio" name="days" value="sunday">Sunday</li>
                    </li>
                    <li class="quest"></li>
                    <li class="quest">In a companion which do you prefer?
                        <li class="quest"><input type="radio" name="prefer" value="opposite" checked>Complete opposite </li>
                        <li class="quest"><input type="radio" name="prefer" value="same">Exactly the same</li>
                        <li class="quest"><input type="radio" name="prefer" value="middle">Somewhere in between</li>
                    </li>

                </ul>
                <input type="submit" name="mySub" value="Find you Jibe">
            </form>
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
