<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Players - Bootstrap Bootstrap Gallery with Modal and Carousel</title>
        <title>http://www.bootply.com/render/97459</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">

		<link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- CSS code from Bootply.com editor -->
    </head>
    <!-- HTML code from Bootply.com editor -->
	<body> 
     <?php
		require_once 'includes/global.inc.php';
		//Declaring Delete Player ID Variable
		$Delete_Player_Id = "";
		$Modify_Player_Id = "";
		//checking to see if Logged on if not kicked back to login page
		if(!isset($_SESSION['logged_in'])) {
			header("Location: login.php");
		}
		echo'<div class="container">';
		//Calling navigation bars function to create for page
		showNavBar();
		//Getting the Users variables from session  
		$userID = $_SESSION["userID"];
		$uTool = new UserTools();
		$user = $uTool->get($userID);
		//checking if Delete Player Text field is filled after form is ran
		// If form is set then deletes selected player id
		if(isset($_POST['Delete-Player'])) {
			//retrieve the $_POST variables
			$Delete_Player_Id = $_POST['Delete-Player'];
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
			// Telling Admin what player_ID was deleted
			// Removes said player from database
			//
			echo "Player_ID : $Delete_Player_Id is Deleted";
			$query = "Delete from Player_Database where Player_ID = $Delete_Player_Id";

			$result = mysql_query($query);
			if (!$result) {
				print "Error - query cannot be processed: ";
				$error = mysql_error();
				print "$error";
				exit;	
				mysql_close();
			}
		}
		// This function checks to see if user is a administrator if provides different view
		//Allowing altering the data
		if ($user->userPriv == 'A') {
			//Connecting to the Server
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
			// 3. Getting all players from databae and ordering by ID
			//
			$query = "select * from Player_Database" .
			" order by Player_ID";

			$result = mysql_query($query);
			if (!$result) {
				print "Error - query cannot be processed: ";
				$error = mysql_error();
				print "$error";
				exit;
			}
			//Creating table to display Data
			//Printing Headers for table
			echo "<table  align='center' Border = 2>";
			echo "<th>Player_ID</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name </th>";
			echo "<th>Position</th>";
			echo "<th>Age</th>";
			echo "<th>Team_ID_num</th>";
			echo "<th>Player picture</th>";
			echo "<th>Modify Player</th>";
			echo "<th>Delete Player</th>";
			//Getting number of rows and Printing out all the data from rows into table
			$num_rows = mysql_num_rows($result);
			for ($i = 0; $i < $num_rows; $i++) {
				$row = mysql_fetch_row($result);
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td><img src = '$row[6]'></img></td><td>
				<form class='form-signin' action='Modify_Player.php' method='post'>
				<button type='Modify' class='btn btn-lg btn-primary btn-block' value=$row[0] name='Modify-Player' />Modify</button>
				</form></td><td><form class='form-signin' action='Players.php' method='post'>
				<button type='Delete' class='btn btn-lg btn-primary btn-block' value=$row[0] name='Delete-Player' />Delete</button>
				</form></td><tr>";
			}
			echo '<p><a class="btn btn-lg btn-primary btn-block" href="Add_Player.php" role="button">Add</a></p>';
	
			mysql_close();
	?>
	
	<?php
		}

		//Creating View for Users
		else{
			echo'<div class="jumbotron">';
			echo'<br><br><br><h1>Players</h1>';
			echo'</div>';
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
			// Query Getting all the players First name, Last Name, Position and picture from table and then Ordering
			// Them by Team ID then First Name
			//
			$query = "select Player_First_Name, Player_LAST_Name, Player_Position, player_pic from Player_Database  order by Team_ID_num, Player_First_Name";
			$result = mysql_query($query);
			if (!$result) {
				print "Error - query cannot be processed: ";
				$error = mysql_error();
				print "$error";
				exit;
			}
			//
			//Producing image and then
			// a table  of first name,last name,Position for each player from selected data.
			//
			$num_rows = mysql_num_rows($result);
			for ($i = 0; $i < $num_rows; $i++) {
				$row = mysql_fetch_row($result);
				echo "<p><img src = $row[3]></img><br>";
				echo "Name: $row[0] $row[1] <br> Position: $row[2] <br></p><hr>";
			}
			mysql_close();
		}
	?>
		</div>
	</body>
</html>