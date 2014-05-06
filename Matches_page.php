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
			<!--Styling the jumbotron to be the same as others but with matches image as background image-->
			.jumbotron {
				height:500px;
				width:100%;
				text-align: center;
				background: transparent; 
				background-image: url(Jumbotron_Images/Matches_image.jpg);
				background-size: cover;
				background-repeat: no-repeat;
			}
        </style>
	</head>
   	 <?php
			require_once 'includes/global.inc.php';
			//checking if user is logged in
		if(!isset($_SESSION['logged_in'])) {
			header("Location: login.php");
		}	
	    echo'<div class="container">';
		//Calling function to create navigation bar
		showNavBar();
	?>
	<div class="jumbotron">
		<h1>Matches</h1>
	</div>
		<div class="container">
			<div class="row">
				<!--Setting the buttons or team names in form to call teams page-->
				<form action="Teams.php" method="post">
					<h1>Matches</h1>
					<ul>
						<li><button type="Germany" class="btn" value="Germany" name="Country" />Germany</button> 0 : 0 <button type="United States" class="btn" value="United States" name="Country" />United States</button><br><input type="radio" name="Team" value="Germany">Germany<br><input type="radio" name="Team" value="United States">United States</li>
					</ul>
				</form>
			</div>
		</div>
	 </div>