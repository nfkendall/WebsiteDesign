<?php
	// register.php
	// Register a player in the database
	//
	require_once 'includes/global.inc.php';

	//initialize php variables used in the form
	$Player_First_Name = "";
	$Player_LAST_Name = "";
	$Player_Position = "";
	$Player_Age = "";
	$Team_ID_num = "";
	$Player_Pic = "";
	$error = "";

	//check to see that the form has been submitted
	if(isset($_POST['submit'])) {
		
		//retrieve the $_POST variables
		$Player_First_Name = $_POST['Player_First_Name'];
		$Player_LAST_Name = $_POST['Player_LAST_Name'];
		$Player_Position = $_POST['Player_Position'];
		$Player_Age = $_POST['Player_Age'];
		$Team_ID_num = $_POST['Team_ID_num'];
		$Player_Pic = $_POST['Player_Pic'];

		//prep the data for saving in a new player object
		$data['Player_First_Name'] = $Player_First_Name;
		$data['Player_LAST_Name'] = $Player_LAST_Name;
		$data['Player_Position'] = $Player_Position;
		$data['Player_Age'] = $Player_Age;
		$data['Team_ID_num'] = $Team_ID_num;
		$data['Player_Pic'] = $Player_Pic;


		//create the new player object
		$newPlayer = new Player($data);

		//save the new user to the database
		$newPlayer->save(true);

		//redirect Back to Player Page
		header("Location: Players.php");
	}

	//If the form wasn't submitted, or didn't validate
	//then we show the add player form again 
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="Add Player to Database" content="">
		<meta name="Nathan Kendall" content="">
		<link rel="shortcut icon" href="images/favicon.png">

		<title>Evaluator Registration</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="signin.css" rel="stylesheet">

	</head>
	<body>
		<div class="container">
		<h2 class="form-signin-heading" style="text-align: center">Add Player</h2>
		<!--form to recieve input values for adding a player-->
		<form class="form-signin" action="Add_Player.php" method="post">
		<input type="text" class="form-control" placeholder="First Name" value="<?php echo $Player_First_Name; ?>" autofocus name="Player_First_Name" required/><br>
		<input type="text" class="form-control" placeholder="Last Name" value="<?php echo $Player_LAST_Name; ?>" name="Player_LAST_Name" required/><br>
		<input type="text" class="form-control" placeholder="Position" value="<?php echo $Player_Position; ?>" name="Player_Position" required/><br>
		<input type="text" class="form-control" placeholder="Age" value="<?php echo $Player_Age; ?>" name="Player_Age" required/>
		<input type="text" class="form-control" placeholder="Team_ID_num" value="<?php echo $Team_ID_num; ?>" name="Team_ID_num" required	/>
		<input type="text" class="form-control" placeholder="Player_Pic_WebAddress" value="<?php echo $Player_Pic; ?>" name="Player_Pic" required/><br>
		<button type="submit" class="btn btn-lg btn-primary btn-block" value="Register" name="submit" />Enter</button>
		</form>
		<?php print $error; ?>
	</body>
</html>