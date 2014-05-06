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
	<body> 
		 <?php
			require_once 'includes/global.inc.php';
			//declaring and initializing variables
			$Modify_Player_Id = "";
			$Player_First_Name = "";
			$Player_LAST_Name = "";
			$Player_Position = "";
			$Player_Age = 0;
			$Team_ID_num = 0;
			$Player_pic = "";
			//checking if logged on and if not sending back to login screen
			if(!isset($_SESSION['logged_in'])) {
				header("Location: login.php");
			}
			echo'<div class="container">';
			//Calling function to create navigation bar
			showNavBar();
			//Checking if form was called 
			if(isset($_POST['Modify_Player_form'])){
					//Setting variables to values in text areas
					$Player_ID_num = $_POST['Player_ID'];
					$Player_First_Name = $_POST['Player_First_Name'];
					$Player_LAST_Name = $_POST['Player_LAST_Name'];
					$Player_Position = $_POST['Player_Position'];
					$Player_Age = $_POST['Player_Age'];
					$Team_ID_num = $_POST['Team_ID_num'];
					$Player_pic = $_POST['Player_pic'];
				//connecting to database
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
				// 3. Updating the Information in database for player.
				//
				$query = "UPDATE Player_Database SET Player_First_Name = '$Player_First_Name' , Player_LAST_Name = '$Player_LAST_Name' , Player_Position = '$Player_Position' ,Player_Age = '$Player_Age' , Team_ID_num = '$Team_ID_num' , Player_pic = '$Player_pic'  WHERE Player_ID = '$Player_ID_num'";

				$result = mysql_query($query);
				if (!$result) {
					 print "Error - query cannot be processed: ";
					 $error = mysql_error();
					 print "$error";
					 exit;
				 }
				 header("Location: Players.php");
			}
			//checking if form from players page was called
			if(isset($_POST['Modify-Player'])) {

				//retrieve the $_POST variables
				$Modify_Player_Id = $_POST['Modify-Player'];
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
				// Selecting values from table where player id matches id passed in
				//
				$query = "select * from Player_Database where Player_Id = $Modify_Player_Id";
				$result = mysql_query($query);
				if (!$result) {
					 print "Error - query cannot be processed: ";
					 $error = mysql_error();
					 print "$error";
					 exit;
				}
				//Setting returned data into variables
				 $row = mysql_fetch_row($result);
				 $Player_First_Name = $row[1];
				 $Player_LAST_Name = $row[2];
				 $Player_Position =  $row[3];
				 $Player_Age =  $row[4];
				 $Team_ID_num =  $row[5];
				 $Player_pic =  $row[6];
					mysql_close();
				//return back to players page if name is empty meaning a invalid id entered
				if($Player_First_Name == "")
				{
					header("Location: Players.php");
				}
			}
		?>
				<!--Form  displaying the values retrieved form the select-->
				<!--Posts the variables and recalls this page when the Modify button is pressed-->
				<form class="form-signin" action="Modify_Player.php" method="post">
				<input type = "text" class="form-control" placeholder="Player_ID" value="<?php echo $Modify_Player_Id?>" name ="Player_ID" readonly/><br> 
				<input type = "text" class="form-control" placeholder="Player_First_Name" value="<?php  echo $Player_First_Name; ?>" name="Player_First_Name" required/><br>
				<input type = "text" class="form-control" placeholder="Player_LAST_Name" value="<?php  echo $Player_LAST_Name; ?>" name="Player_LAST_Name" required/><br>
				<input type = "text" class="form-control" placeholder="Player_Position" value="<?php  echo $Player_Position; ?>" name="Player_Position" required/><br>
				<input type = "text" class="form-control" placeholder="Player_Age" value="<?php  echo $Player_Age; ?>" name="Player_Age" required/><br>
				<input type = "text" class="form-control" placeholder="Team_ID_num" value="<?php  echo $Team_ID_num; ?>" name="Team_ID_num"/><br>
				<input type = "text" class="form-control" placeholder="Player_pic" value="<?php  echo $Player_pic; ?>" name="Player_pic" required/><br>
				<button type="Modify" class="btn btn-lg btn-primary btn-block" value="Modify" name="Modify_Player_form" />Modify</button>
				</form>
			</div>
	</body>
</html>