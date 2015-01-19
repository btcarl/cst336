<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Lab 2</title>
		<meta name="description" content="">
		<meta name="author" content="bcarlston">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link type="text/css" rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<div class="gamewrapper">
            <h1> Connect Four</h1>
		<?php
			$randomnum;
            function makeColumn(){
                return array(0,0,0,0,0,0); 
            }
			function checkWin($game, $x, $y, $color)
			{
				$count = 0;
				//horizontal check

				for($i=$x; $i>=0;$i--){
					if($game[$i][$y]==$color){
						$count++;

					}else{
						break;
					}
				}
				if($x<6){
					for($i=($x+1);$i<=6;$i++){
						//echo "<br>debug: $i,$y";
						if($game[$i][$y]==$color){
						$count++;
						}else{
							break;
						}
					}
				}
				if ($count>=4){
					 return true;
						 
				}
				//vertical check
				$count = 0;
				for($i=$y; $i>=0;$i--){
					if($game[$x][$i]==$color){
						$count++;
					}else{
						break;
					}
				}
				if($y<5){
					for($i=($y+1);$y<=5;$y++){
						if($game[$x][$i]==$color){
						$count++;
						}else{
							break;
						}
					}
				}
				if ($count>=4) {
					return true;
				}
				
				//diagonal left
				$count = 1;
				if($x-1>=0 and $y+1<=5){
					if($game[$x-1][$y+1]==$color){
						$count++;
						if($x-2>=0 and $y+2<=5){
							if($game[$x-2][$y+2]==$color){
								$count++;
								if($x-3>=0 and $y+3<=5){
									if($game[$x-3][$y+3]==$color){
										$count++;
									}
								}
							}
						}
					}
				}
				if($x+1<=6 and $y-1>=0){
					if($game[$x+1][$y-1]==$color){
						$count++;
						if($x+2<=6 and $y-2>=0){
							if($game[$x+2][$y-2]==$color){
								$count++;
								if($x+3<=6 and $y-3>=0){
									if($game[$x+3][$y-3]==$color){
										$count++;
									}
								}
							}
						}
					}
				}
				if ($count>=4) {
					return true;
				}
				
				//diagonal right
				$count = 1;
				if($x-1>=0 and $y-1>=0){
					if($game[$x-1][$y-1]==$color){
						$count++;
						if($x-2>=0 and $y-2>=0){
							if($game[$x-2][$y-2]==$color){
								$count++;
								if($x-3>=0 and $y-3>=0){
									if($game[$x-3][$y-3]==$color){
										$count++;
									}
								}
							}
						}
					}
				}
				if($x+1<=6 and $y+1<=5){
					if($game[$x+1][$y+1]==$color){
						$count++;
						if($x+2<=6 and $y+2<=5){
							if($game[$x+2][$y+2]==$color){
								$count++;
								if($x+3<=6 and $y+3<=5){
									if($game[$x+3][$y+3]==$color){
										$count++;
									}
								}
							}
						}
					}
				}
				if ($count>=4) {
					return true;
				}
				return false;
			}

			$c1count = 0;
            $c2count = 0;
            $c3count = 0;
            $c4count = 0;
            $c5count = 0;
            $c6count = 0;
            $c7count = 0;
			
			$board = array(makeColumn(), makeColumn(), makeColumn(), makeColumn(), makeColumn(), makeColumn(), makeColumn());
        
            $gameWon = false;
            $plays = 0;
			$winner =0;
            while($plays< 43 and !$gameWon)
            {

                $color = 0;
                if($plays%2==0)$color = 1;
                else $color = 2;
                $col = rand(1,7);
                switch($col){
                    case(1):
                        if ($c1count<6){
                            $board[0][$c1count] = $color;
                            $plays++;
							$gameWon = checkWin($board, 0, $c1count, $color);
							$c1count++;
                        }
                        break;
                    case(2):
                        if ($c2count<6){
                            $board[1][$c2count] = $color;
							$gameWon = checkWin($board, 1, $c2count, $color);
                            $c2count++;
                            $plays++;
                        }
                        break;
                    case(3):
                        if ($c3count<6){
                            $board[2][$c3count] = $color;
							$gameWon = checkWin($board, 2, $c3count, $color);
                            $c3count++;
                            $plays++;
                        }
                        break;
                    case(4):
                        if ($c4count<6){
                            $board[3][$c4count] = $color;
							$gameWon = checkWin($board, 3, $c4count, $color);
                            $c4count++;
                            $plays++;
                        }
                        break;
                    case(5):
                        if ($c5count<6){
                            $board[4][$c5count] = $color;
							$gameWon = checkWin($board, 4, $c5count, $color);
                            $c5count++;
                            $plays++;
                        }
                        break;
                    case(6):
                        if ($c6count<6){
                            $board[5][$c6count] = $color;
							$gameWon = checkWin($board, 5, $c6count, $color);
                            $c6count++;
                            $plays++;
                        }
                        break;
                    case(7):
                        if ($c7count<6){
                            $board[6][$c7count] = $color;
							$gameWon = checkWin($board, 6, $c7count, $color);
                            $c7count++;
                            $plays++;
                        }
                        break;
				}
				if ($gameWon) $winner = $color;
            }

			echo "<table border=\"3\">";
			for($i=0; $i<6; $i++)
			{
				echo "<tr>";
				for($j=0; $j<7; $j++)
				{
					echo "<td ";
					if($board[$j][5-$i] == 1)
					{
						echo "class=\"yellow\">";
					}elseif($board[$j][5-$i] == 2){
						echo "class=\"red\">";
					}
					echo "</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
			if($winner==1) echo "<h2>Yellow wins!!</h2>";
			elseif($winner==2) echo "<h2>Red wins!!</h2>";
			else echo "<h2>No Winner, try again.</h2>";
			echo "<br>";

			
		?>
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
              <li class="links"><a  style="color:#e91e63" href="http://hosting.otterlabs.org/carlstonbriant/CST336/assignments/assignment2/index.php">Assignment 2</a></li>
          </ul>
        </li>
        <li class="sections">Team Assignment</li>
        <li class="sections"><a href="http://btc-csit.blogspot.com/">Learning Journal</a></li>
      </ul>
    </div>
	</body>
</html>
