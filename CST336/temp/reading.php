<html>
    <head>
        <title>My Movie site - <?php echo $_REQUEST['favmovie']; ?></title>
        <?php
			session_start();
			if($_SESSION['authuser']!= 1)
				{
					echo "Sorry you do not have permission to view this site";
					exit();	
				}
		?>
    </head>  
    <body>
        <?php include "header.php";?>
        <?php
            function listmovies_1()
            {
                echo "1. Life of Brian<br>";
                echo "2. stripes<br>";
                echo "3. Office Space<br>";
                echo "4. The Holy Grail<br>";
                echo "5. the Matrix<br>";
            }
            function listmovies_2() 
            { 
                echo "6. Terminator 2<br>"; 
                echo "7. Star Wars<br>"; 
                echo "8. Close Encounters of the Third Kind<br>";
                echo "9. Sixteen Candles<br>"; 
                echo "10. Caddyshack<br>"; 
            }
            if (isset($_REQUEST['favmovie']))
            {
                //define("FAVMOVIE","the Life of Brian");
                echo "Welcome to our site";
                echo $_SESSION['username'];
                echo "<br>";
                echo "My favorite movie is ";
                echo $_REQUEST['favmovie'];
                echo "<br>";
                $movieRate = 5;

                echo "My movie rating for this movie is: ";
                echo $movieRate;
            }
            else
            {
                echo "My top ";
                echo $_REQUEST['movienum'];
                echo " movies are: ";
                echo "<br>";
                listmovies_1();
                if ($_REQUEST['movienum']==10)
                {
                    listmovies_2();
                }
            }
        ?>
    </body>
</html>