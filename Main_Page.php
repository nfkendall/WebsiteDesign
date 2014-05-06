<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Soccer News Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	        <style type="text/css">
.jumbotron {
  height:500px;
  width:100%;
  text-align: center;
  background: transparent; 
  }
        </style>
  </head>

  <body>

 <?php
 require_once 'includes/global.inc.php';
 
	if(!isset($_SESSION['logged_in'])) {
		header("Location: login.php");
	}
	echo '<div class="container">';
	showNavBar();

?>
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Soccer News Page</h1>
        <p class="lead">Welcome to your one stop source for all you soccer information needs!</p>
	  </div>
      <!-- row for 3 columns-->
      <div class="row">
        <div class="col-lg-4">
		<!
          <h2>Previous Matches</h2>
		<!--Displaying previous game teams and scores-->
          <p class="text-danger">Germany 3:0 Republic of Ireland</p>
        </div>
        <div class="col-lg-4">
          <h2>Upcoming Matches</h2>
		  <!--Showing upcoming games and provides link at bottom to matches page-->
          <p>Unites States of America - Germany</p>
          <p><a class="btn btn-primary" href="Matches_page.php" role="button">Matches</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Soccer News</h2>
		  <!--RSS feeds showing information on soccer-->
		  <!--RSS feeds for information on latest soccer news and World Cup News. Both are feeding from Fifa.com-->
		  <!--RSS feed code provided by rssinclude.com -->
		  <?php @readfile('http://output64.rssinclude.com/output?type=php&id=871786&hash=221bd0e88324986bcf2d1b65ac4045d6')?>
		  <?php @readfile('http://output35.rssinclude.com/output?type=php&id=871790&hash=edc2f70f50c56909e48f01025cf9093d')?>
		</div>
      </div>
      <!-- Site footer -->
      <div class="footer">
        <p>&copy; Company 2014</p>
      </div>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
