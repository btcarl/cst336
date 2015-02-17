<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Lab 3</title>
		<meta name="description" content="">
		<meta name="author" content="bcarlston">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link type="text/css" rel="stylesheet" href="style.css">
	</head>
      <?php
            $left= "";
            $right="";
            $leftUnitType="";
            $rightUnitType="";
            $errorMessage= "";
            if(isset($_GET['left'])){
                if (is_numeric($_GET['left'])){
                    $left = $_GET['left'];
                }
                else{
                    $left = 0.0;
                    $errorMessage = "You must enter a number";
                }
            }
            if(isset($_GET['leftSelect'])){
                $leftUnitType = $_GET['leftSelect'];
            }

            if(isset($_GET['rightSelect'])){
                $rightUnitType = $_GET['rightSelect'];
            }
            switch($leftUnitType){
                case 'inches':  switch($rightUnitType){
                                    case 'inches':  $right = $left;
                                                    break;
                                    case 'cm':      $right= $left*2.54;
                                                    break;
                                    case 'meters':  $right = $left*0.0254;
                                                    break;
                                    case 'yards':   $right = $left*0.02777778;
                                                    break;
                                    case 'feet':    $right = $left*(1/12);
                                                    break;
                                }
                                break;
                case 'cm':        switch($rightUnitType){
                                    case 'inches':  $right = $left*0.39370079;
                                                    break;
                                    case 'cm':      $right= $left;
                                                    break;
                                    case 'meters':  $right = $left*0.01;
                                                    break;
                                    case 'yards':   $right = $left*0.01093613;
                                                    break;
                                    case 'feet':    $right = $left*0.0328084;
                                                    break;
                                }
                                break;
                case 'meters':    switch($rightUnitType){
                                    case 'inches':  $right = $left*39.3700787;
                                                    break;
                                    case 'cm':      $right= $left*100;
                                                    break;
                                    case 'meters':  $right = $left;
                                                    break;
                                    case 'yards':   $right = $left*1.0936133;
                                                    break;
                                    case 'feet':    $right = $left*3.2808399;
                                                    break;
                                }
                                break;
                case 'yards':     switch($rightUnitType){
                                    case 'inches':  $right = 12;
                                                    break;
                                    case 'cm':      $right= $left*91.44;
                                                    break;
                                    case 'meters':  $right = $left*6;
                                                    break;
                                    case 'yards':   $right = $left;
                                                    break;
                                    case 'feet':    $right = $left*3;
                                                    break;
                                }
                                break;
                case 'feet':      switch($rightUnitType){
                                    case 'inches':  $right = $left*12;
                                                    break;
                                    case 'cm':      $right= $left*30.48;
                                                    break;
                                    case 'meters':  $right = $left*0.3048;
                                                    break;
                                    case 'yards':   $right = $left*0.33333333;
                                                    break;
                                    case 'feet':    $right = $left;
                                                    break;
                                }
                                break;
            }

            function isSelected($input, $type){
                if($input==$type) return 'selected';
                else return '';

            }
        ?>
    <body>
        <h1 >Converter</h1>
        <div id="mainWrapper">
            <form name="convert form" method="get">
                <p class="error"><?php echo $errorMessage ?></p>
                <table>
                    <tr>
                        <td><input type="text" name="left" maxlength="20" value="<?php echo $left; ?>" > </td>
                        <td id="equals" rowspan="2" > = </td>
                        <td><input type="text" name="right" maxlength="20" disabled value="<?php echo $right; ?>"> </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="leftSelect" size="1">
                                <option value="inches" <?php echo isSelected('inches', $leftUnitType) ?> >Inches</option>
                                <option value="cm" <?php echo isSelected('cm', $leftUnitType) ?>>Centimeters(cm)</option>
                                <option value="meters" <?php echo isSelected('meters', $leftUnitType) ?>>Meters(m)</option>
                                <option value="yards" <?php echo isSelected('yards', $leftUnitType) ?>>Yards</option>
                                <option value="feet" <?php echo isSelected('feet', $leftUnitType) ?>>Feet</option>
                            </select>
                        </td>
                        <td>
                            <select name="rightSelect" size="1">
                                <option value="inches" <?php echo isSelected('inches', $rightUnitType) ?>>Inches</option>
                                <option value="cm" <?php echo isSelected('cm', $rightUnitType) ?>>Centimeters(cm)</option>
                                <option value="meters" <?php echo isSelected('meters', $rightUnitType) ?>>Meters(m)</option>
                                <option value="yards" <?php echo isSelected('yards', $rightUnitType) ?>>Yards</option>
                                <option value="feet" <?php echo isSelected('feet', $rightUnitType) ?>>Feet</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td  id="subbut" colspan="3"><input type="submit" name="mySub" value="Enter"></td>
                    </tr>
                </table>
            </form>

        </div>
        <?php
            $left= "";
            $right="";
            if(isset($_GET['left'])){
                $left = $_GET['left'];
            }
        ?>





        <div id="navWrapper">
            <h2 id="linkheader">CST 336 Links</h2>
            <ul>
                <li>
                  <span class="sections">Labs</span>
                  <ul>
                    <li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/lab1/lab1.html">Lab 1</a></li>
                    <li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/lab2/index.php">Lab 2</a></li>
                    <li class="links"><a  style="color:#e91e63" href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/lab3/index.php">Lab 3</a></li>
                    <li class="links">Lab 4</li>
                    <li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/lab5/lab5.php">Lab 5</a></li>
					<li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/Lab6/lab6.html">Lab 6</a></li>
					<li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/Labs/Lab7/lab7.html">Lab 7</a></li>
                  </ul>
                </li>
                <li >
                  <span class="sections">Assignments</span>
                  <ul>
                      <li class="links"><a  href="http://hosting.otterlabs.org/carlstonbriant/CST336/assignments/assignment1/homepage.html">Assignment 1</a></li>
                      <li class="links"><a  href="http://hosting.otterlabs.org/carlstonbriant/CST336/assignments/assignment2/index.php">Assignment 2</a></li>
                      <li class="links"><a href="http://hosting.otterlabs.org/carlstonbriant/CST336/assignments/assignment3/index.php">Assignment 3</a></li>
                  </ul>
                </li>
                <li class="sections">Team Assignment</li>
                <li class="sections"><a href="http://btc-csit.blogspot.com/">Learning Journal</a></li>
            </ul>
        </div>
    </body>
</html>
