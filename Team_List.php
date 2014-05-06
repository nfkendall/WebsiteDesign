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
			<style type="text/css">
				<!--Styling Jumbotron like others but with Fifa Players image as background image-->
				.jumbotron {
					height:500px;
					width:100%;
					text-align: center;
					background: transparent; 
					background-image: url(Jumbotron_Images/Fifa_players.jpg);
					background-size: cover;
					background-repeat: no-repeat;
				}
			</style>
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
     <?php
		 require_once 'includes/global.inc.php';
		//Checking if loggd on if not send to login page
		if(!isset($_SESSION['logged_in'])) {
			header("Location: login.php");
		}
		echo'<div class="container">';
		//calling funtion to create navigation bar 
		showNavBar();
	?>
	<div class="jumbotron">
		<h1>Teams</h1>
		</div>
    <div class="row">
		<ul>
			<!--Showing team flag before button linked into form->
			<!--Form to send team name to teams webpage generating list of players-->
			<form action="Teams.php" method="post">
				<div class="col-lg-12 col-sm-12 col-xs-12"><a title="Germany" href="#"><img class="thumbnail img-responsive" src="Jumbotron_Images/Germany_Pic.jpg"></a></div>
				<div>
					<button type="Germany" class="btn" value="Germany" name="Country" />Germany</button>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-12"><a title="United States" href="#"><img class="thumbnail img-responsive" src="Jumbotron_Images/UnitedStates_pic.jpg"></a></div>
				<div>
					<button type="United States" class="btn" value="United States" name="Country" />United States</button>
				</div>
		  </form>
		</ul>
	</div>
    <hr>
        <script type='text/javascript' src="jquery.js"></script>
        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 
        <!-- JavaScript jQuery code from Bootply.com editor -->
    </body>
</html>