<html>
<style type="text/css">
.modal-dialog {}
.thumbnail {margin-bottom:8px;}
.jumbotron {
  height: 400px;
  width: 100%;
  text-align: center;
  background-size: cover;
  }
.nav-justified {
  background-color: #eee;
  border-radius: 5px;
  border: 1px solid #ccc;
  }
  @media (min-width: 768px) {
  .nav-justified {
    max-height: 52px;
  }
  .nav-justified > li > a {
    border-left: 1px solid #fff;
    border-right: 1px solid #d5d5d5;
  }
  .nav-justified > li:first-child > a {
    border-left: 0;
    border-radius: 5px 0 0 5px;
  }
  .nav-justified > li:last-child > a {
    border-radius: 0 5px 5px 0;
    border-right: 0;
  }
  .nav-justified > .active > a,
.nav-justified > .active > a:hover,
.nav-justified > .active > a:focus {
  background-color: #ddd;
  background-image: none;
  box-shadow: inset 0 3px 7px rgba(0,0,0,.15);
}
}
        .auto-style1 {
	margin-left: 0px;
}
        </style>
<?php		
	function showNavBar() {
		echo '<div class="masthead">';
			echo'<ul class="nav nav-justified">';
				echo'<li><a href="Main_Page.php">Home</a></li>';
				echo'<li><a href="Team_List.php">Teams</a></li>';
				echo'<li><a href="Players.php">Players</a></li>';
				echo'<li><a href="Matches_page.php">Matches</a></li>';
				echo'<li><a href="logout.php">logout</a></li>';
			echo'</ul>';
		echo'</div>';
	}
?>
</html>