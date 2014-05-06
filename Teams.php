<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Teams - Bootstrap Bootstrap Gallery with Modal and Carousel</title>
        <title>http://www.bootply.com/render/97459</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">

		<link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- CSS code from Bootply.com editor -->
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body >
			<?php
				require_once 'includes/global.inc.php';
				//Checking to see if logged on if not sending back to login page
				if(!isset($_SESSION['logged_in'])) {
					header("Location: login.php");
				}
				echo'<div class="container">';
				//Creating Navebar For page
				showNavBar();
				//Getting Country that was selected from Team List page
				$country = $_POST['Country'];
				echo"<h1>$country Team</h1><br><br><hr><br>";
				//
				// 1. Connect to local mySQL installation. User and password provided.
				//
				$db = mysql_connect("ps11.pstcc.edu","c1510a07","cit02##");
				if (!$db){
					exit("Error - Could not connect to MySQL"); 
				}
				//
				// 2. Select the database to use.
				//
				$er = mysql_select_db("c1510a07test");
				if (!$er){
					exit("Error - Could not select the database!");
				}
				//
				// 3. Getting the Team_Id by searching for country
				//
				$query = "select Team_ID_num from Team_Database where Team_country = '$country'";

				$result = mysql_query($query);
				//if fails presents error
				if (!$result) {
					print "Error - query cannot be processed: ";
					$error = mysql_error();
					print "$error";
					exit;
				}
				//Getting row Data from query
				$Country_Name_ID_row = mysql_fetch_row($result);
				//Getting the Country ID
				$Country_Name_ID = $Country_Name_ID_row[0];
				//
				// 4. Select the players for team that was selected
				//
				$query = "select Player_First_Name, Player_LAST_Name, Player_Position, player_pic from Player_Database where Team_ID_num = '$Country_Name_ID'" .
				" order by Player_First_Name";

				$result = mysql_query($query);
				if (!$result) {
					print "Error - query cannot be processed: ";
					$error = mysql_error();
					print "$error";
				exit;
				}
				//
				// 4. Process the result  A list of players with their Picture, First name, Last name, Position and prividing a line between each player. 
				//
				$num_rows = mysql_num_rows($result);
				for ($i = 0; $i < $num_rows; $i++) {
					$row = mysql_fetch_row($result);
					echo "<p><img src = $row[3]></img><br>";
					echo "Name: $row[0] $row[1] <br> Position: $row[2] <br></p><hr>";
				}
			?>
				</div>
        <script type='text/javascript' src="jquery.js"></script>
        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <!-- JavaScript jQuery code from Bootply.com editor -->
    </body>
</html>