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
        <link type="text/css" rel="stylesheet" href="style.css">
	</head>

	<body>
		<div>
        
		<?php
			$randomnum;
			$even = 0;
			$odd = 0;
			echo "<table border=\"3\">";
			for($i=0; $i<10; $i++)
			{
				echo "<tr>";
				for($j=0; $j<10; $j++)
				{
					$randomnum = rand(1,100);
					
					echo "<td ";
					if($randomnum%2 == 0)
					{
						echo "class=\"even\">";
						$even++;
					}else{
						echo "class=\"odd\">";
						$odd++;
					}
					echo $randomnum;
					echo "</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
			echo "<h2>There are " . $odd . " odd numbers and " . $even . " even numbers.</h2>";
			echo "<br>";
			echo "<h2>There are " . $odd . "% of odd numbers and " . $even . "% of even numbers.</h2>";
			
		?>
		</div>
	</body>
</html>